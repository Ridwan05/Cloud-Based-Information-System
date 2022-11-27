<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a list of all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Display the form for registering users
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Handle submission of user creation form
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userData = $request->validate(User::validationRules());
        $userData['is_admin'] = (bool) request('is_admin');

        $user = User::create($userData);

        if (empty($user->id)) {
            return redirect(route('users.create'))
                ->withInput()
                ->with('status_error', 'User not saved. Please, try again!');
        }

        return redirect(route('users.index'))
            ->with('status_success', 'User saved successfully!');
    }

    /**
     * Display the form for editing users
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail((int) $id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update user details
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail((int) $id);
        $userData = $request->validate(User::validationRules($id));
        $userData['is_admin'] = (bool) request('is_admin');

        if (
            empty($userData['password'])
        ) {
            unset($userData['password']);
        }
        $user->fill($userData);

        if ($user->save()) {
            return redirect(route('users.index'))
                ->with('status_success', 'User details saved successfully!');
        }
        
        return redirect(route('users.edit', $id))
            ->withInput()
            ->with('status_error', 'User details not saved. Please, try again!');
    }
}
