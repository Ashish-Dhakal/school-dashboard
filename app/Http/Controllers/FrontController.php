<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class FrontController extends BaseController
{
    public function index(){
        $program = $this->fetch_all_program();
        $notice = $this->fetch_all_notice();
        $event = $this->fetch_all_event();
        
        $data = array_merge($program, $notice, $event); 
        return view('frontend.index',$data);
    }

    public function about(){
        return view('frontend.about');
    }
}
