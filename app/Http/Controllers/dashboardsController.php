<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardsController extends Controller
{
    public function index(){

        $data['employeedata'] = [
            'name'=>'Aung Ko Ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        // dd($data);

        return view('layouts/index',$data);
    }
}
