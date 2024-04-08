<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $title = "Dashboard";
        $description = "Admin Panel Dashboard";

        return view('index',[
            'title'=>$title,
            'description'=>$description
        ]);
    }
}
