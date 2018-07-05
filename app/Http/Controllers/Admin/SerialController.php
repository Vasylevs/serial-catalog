<?php

namespace App\Http\Controllers\Admin;

use App\Serial;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SerialController extends Controller
{

    public function index(){
        return redirect()->route('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serial.add_serial');
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
            return redirect()->route('admin.serial.create')->withErrors($validation)->withInput();
        }

        if($request->hasFile('img')){
            $file = $request->file('img');
            $data['img'] = $file->getClientOriginalName();
            $file->move(public_path() . '/assets/img',$data['img']);
        }

        $serial = new Serial();
        $serial->fill($data);
        if($serial->save()){
            return redirect()->route('admin.index')->with('status','Сериал добавлен');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function show(Serial $serial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function edit(Serial $serial)
    {
        $seasons = DB::table('seasons')->where('serial_id', $serial->id)->get();
        return view('admin.serial.edit',[
            'serial' => $serial,
            'seasons' => $seasons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serial $serial)
    {
        $serial->update($request->all());
        return redirect()->route('admin.serial.edit',$serial->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serial $serial)
    {
        $serial->delete();
        return redirect()->route('admin.index');
    }
}
