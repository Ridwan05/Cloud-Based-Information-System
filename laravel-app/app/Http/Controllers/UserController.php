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
}
