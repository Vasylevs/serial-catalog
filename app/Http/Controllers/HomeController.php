<?php

namespace App\Http\Controllers;

use App\Season;
use App\Serial;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serials = DB::table('serials')->paginate(20);
        return view('home',['serials' => $serials]);
    }

    public function serial($id){
        $serial = Serial::where('id',$id)->first();
        $seasons = $serial->season()->paginate(8);
        return view('serial',['serial' => $serial, 'seasons' => $seasons]);
    }

    public function season($id){
        $season = Season::where('id',$id)->first();
        $serias = $season->serie()->paginate(10);
        $serial = DB::table('serials')->where('id',$season->serial_id)->first();
        return view('season',[
            'season' => $season,
            'serias' => $serias,
            'serial' => $serial
        ]);
    }

    public function seria($id){
        $seria = Serie::where('id',$id)->first();
        return view('seria',['seria' => $seria]);
    }
}
