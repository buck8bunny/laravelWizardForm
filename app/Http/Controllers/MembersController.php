<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

// Assuming you have a "User" model for the "users" table
class MembersController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users from the "users" table

        return view('members', ['users' => $users]);
    }

}

