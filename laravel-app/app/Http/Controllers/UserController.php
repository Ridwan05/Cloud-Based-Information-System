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
}
