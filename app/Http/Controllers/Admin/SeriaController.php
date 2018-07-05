<?php

namespace App\Http\Controllers\Admin;

use App\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset($_GET['season_id'])){
            $season_id = (int)$_GET['season_id'];
            $season = DB::table('seasons')->where('id', "{$season_id}")->first();
            return view('admin.seria.add',['season' => $season]);

        } else {
            return redirect()->route('admin.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validation = Validator::make($data,[
            'title' => 'required'
        ]);

        if($validation->fails()){
            return redirect("admin/season/{$data['season_id']}}/edit");
        }

        if($request->hasFile('img')){
            $file = $request->file('img');
            $data['img'] = $file->getClientOriginalName();
            $file->move(public_path() . '/assets/img',$data['img']);
        }

        if($request->hasFile('video')){
            $file = $request->file('video');
            $data['video'] = $file->getClientOriginalName();
            $file->move(public_path() . '/assets/video',$data['video']);
        }

        $serie = new Serie();
        $serie->fill($data);
        if($serie->save()){
            return redirect("admin/season/{$data['season_id']}}/edit")->with('status','Серия добавлена');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {
        $season = DB::table('seasons')->where('id', "{$serie->season_id}")->first();
        return view('admin.seria.edit',['season' => $season, 'serie' => $serie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {
        $serie->update($request->all());
        return redirect()->route('admin.season.edit',$serie->season_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();
        return redirect()->route('admin.season.edit',$serie->season_id);
    }
}
