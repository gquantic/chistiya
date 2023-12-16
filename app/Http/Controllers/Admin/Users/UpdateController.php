<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class UpdateController extends Controller
{
    public function __invoke(User $user)
    {
        $data=request()->validate(['name'=>'required|string', 'email'=>'required', 'role'=>'required']);
        $user->update($data);
        return redirect()->route('admin.users.show', $user->id);
    }
}
