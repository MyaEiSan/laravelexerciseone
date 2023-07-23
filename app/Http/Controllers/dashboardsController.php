<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardsController extends Controller
{
    public function index(){

        $hay = "Hay Hay";
        return view('layouts/index',compact('hay'));
    }
}
