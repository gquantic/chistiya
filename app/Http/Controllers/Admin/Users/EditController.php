<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;



class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $users=User::all();

        return view('admin.users.edit', compact(['users', 'user']));
    }
}
