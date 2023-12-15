<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
