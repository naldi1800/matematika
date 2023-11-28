<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        $page = "home";
        $jmlSoal = count(Soal::all());

        $start = User::find(Auth::user()->id)->skor == null;
        return view('user.index', compact(['page', 'jmlSoal', 'start']));
    }
    public function adminHome()
    {
        $page = "home";
        $jmlSoal = count(Soal::all());
        $jmlUser = count(User::where('role', '=', '0')->get());
        $jmlUserFinish = count(User::where('role', '=', '0')->where('skor', '!=', null)->get());
        return view('home', compact(['page', 'jmlSoal', 'jmlUser', 'jmlUserFinish']));
    }
}
