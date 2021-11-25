<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function usersIndex()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $count = 1;
        return view('admin.manage.users.index', compact('users', 'count'));
    }

    public function usersCreate()
    {
        $roles = Role::all();
        return view('admin.manage.users.create', compact('roles'));
    }
}
