<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public $page = "materi";
    private $exept = ['_token'];
    public function index(){
        $page = $this->page;
        return view("materi.index", compact(['page']));
    }
}
