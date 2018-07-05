<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Season;
use App\Serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeasonController extends Controller
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
        if(isset($_GET['serial_id'])){
            $serial_id = (int)$_GET['serial_id'];
            $serial = DB::table('serials')->where('id', "{$serial_id}")->first();
            return view('admin.season.add',['serial' => $serial]);

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
            return redirect("admin/serial/{$data['serial_id']}}/edit");
        }

        if($request->hasFile('img')){
            $file = $request->file('img');
            $data['img'] = $file->getClientOriginalName();
            $file->move(public_path() . '/assets/img',$data['img']);
        }

        $season = new Season();
        $season->fill($data);
        if($season->save()){
            return redirect("admin/serial/{$data['serial_id']}}/edit")->with('status','Сезон добавлен');
        }
        dump($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        $serial = DB::table('serials')->where('id', "{$season->serial_id}")->first();
        return view('admin.season.edit',['serial' => $serial, 'season' => $season]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        $season->update($request->all());
        return redirect()->route('admin.serial.edit',$season->serial_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $season->delete();
        return redirect()->route('admin.serial.edit',$season->serial_id);
    }
}
