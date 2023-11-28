<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $page = "userdata";
    public function user() {
        $page = $this->page;
        // $user = User::all(['name', 'email', 'role', 'skor', 'created_at'])->where('role', 0);
        $user = User::where('role', '=', 0)->get();
        return view("user.admin", compact(['page', 'user']));
    }

    public function deleteSkor($id) {
        User::where('id', $id)->update(array('skor' => null));
        return redirect('/userdata');
    }
}
