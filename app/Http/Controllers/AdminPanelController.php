<?php

namespace App\Http\Controllers;


class AdminPanelController extends Controller
{

    public function index(){
        $title="Dashboard";
        return view('admin.index',['title' => $title]);
    }





}
