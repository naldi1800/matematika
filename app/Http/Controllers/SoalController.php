<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public $page = "soal";
    private $exept = ['_token'];
    public function index(){
        $page = $this->page;
        $soal = Soal::all();
        return view("soal.index", compact(["soal", 'page']));
    }

    public function create(){
        $page = $this->page;
        return view("soal.create", compact(['page']));
    }

    public function save(Request $r){
        Soal::create($r->except($this->exept));
        return redirect(to: "/soal");
    }

    public function update($id){
        $page = $this->page;
        $data = Soal::find($id);
        return view("soal.update", compact(['page', 'data']));
    }

    public function edit($id, Request $r){
        $soal = Soal::find($id);
        $soal->update($r->except($this->exept));
        return redirect(to: "/soal");
    }

    public function delete($id){
        $soal = Soal::find($id);
        $soal->delete();
        return redirect(to: "/soal");
    }
}
