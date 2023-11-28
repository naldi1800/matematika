<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewUserController extends Controller
{
    // public $page = "user";
    private $exept = ['_token', '_method'];
    public function index()
    {
        $page = "home";
        $start = User::find(Auth::user()->id)->skor == null;
        return view("user.index", compact(['page', 'start']));
    }
    public function soal($number = 1)
    {

        $page = "soal";
        $soal = Soal::all();
        $maxNumber = count($soal);
        $soal = $soal[$number - 1];
        $start = User::find(Auth::user()->id)->skor == null;

        return view("user.soal", compact(['page', 'start', 'soal', 'number', 'maxNumber']));
    }
    public function soalNext($number, Request $r)
    {
        $p = $r->except($this->exept);
        session($p);
        $start = User::find(Auth::user()->id)->skor == null;

        return redirect('/user/soal/' . ($number + 1));
    }
    public function save(Request $r)
    {
        $p = $r->except($this->exept);
        session($p);

        $soal = Soal::all();
        $maxNumber = count($soal);
        $answer = [0, 0];
        $cek = array();

        foreach ($soal as $i => $s) :

            if (session('pilihan' . ($i + 1)) == $s->answer) :
                $answer[0] += 1;
            else :
                $answer[1] += 1;
            endif;
        endforeach;
        $skor = ( $answer[0] / $maxNumber) * 100;
        User::where('id', Auth::user()->id)->update(array('skor' => $skor));
        return redirect('/user/penjelasan/1');
    }

    public function showAnswer($number = 1)
    {
        $page = 'penjelasan';
        $soal = Soal::all();
        $maxNumber = count($soal);
        $answer = [0, 0];
        $cek = array();

        foreach ($soal as $i => $s) :

            if (session('pilihan' . ($i + 1)) == $s->answer) :
                $answer[0] += 1;
            else :
                $answer[1] += 1;
            endif;
        endforeach;

        $soal = $soal[$number - 1];

        $p1 = explode(",", $soal->soal)[0];
        $p2 = explode(",", $soal->soal)[1];

        $p1 = explode(" ", $p1);
        $p2 = explode(" ", $p2);


        $x1 = $this->getXY($p1, "x");
        $y1 = $this->getXY($p1, "y");
        $c1 = end($p1);

        $x2 = $this->getXY($p2, "x");
        $y2 = $this->getXY($p2, "y");
        $c2 = end($p2);

        $det = $x1 * $y2 - $x2 * $y1;

        if ($det != 0) {
            $x = ($c1 * $y2 - $c2 * $y1) / $det;
            $y = ($x1 * $c2 - $x2 * $c1) / $det;
        }
        $xp = [$x1 * $x, $x2 * $x];
        $yp = [$y1 * $y, $y2 * $y];
        $xOp = (max($xp) < 0) ? abs(min($xp)) : max($xp) - 1;
        $yOp = (max($yp) < 0) ? abs(min($yp)) : max($yp);


        $start = User::find(Auth::user()->id)->skor == null;
        return view("user.penjelasan", compact(['page', 'start', 'answer', 'soal', 'number', 'maxNumber', 'x', 'y', 'xp', 'yp', 'xOp', 'yOp']));
    }

    public function materi()
    {
        $page = 'materi';
        $start = User::find(Auth::user()->id)->skor == null;
        return view("user.materi", compact(['page', 'start']));
    }

    //  Metode Private
    private function getXY($arr, $search)
    {
        $xy = 0;
        if (in_array($search, $arr)) {
            $xy = 1;
        } else {
            foreach ($arr as $p) {
                if (strpos($p, $search)) {
                    $xy = str_replace($search, "", $p);
                    break;
                }
            }
        }
        return (int) $xy;
    }
}
