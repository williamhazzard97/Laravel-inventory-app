<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Create admin role and assign to admin user
        
        $user = User::find('1');

        $user->assignRole('Admin');
        $role = Role::findByName('Admin');

        $role->givePermissionTo('edit-users');

        return view('home', ['items' => Item::all()]);
    }
}
