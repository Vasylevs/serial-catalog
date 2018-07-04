<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Serial;

class AdminController extends Controller
{
    public function index(){
        return view('admin.serial_catalog', [
            'serials' => Serial::paginate(8)
        ]);
    }
}
