<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class FrontController extends BaseController
{
    public function index()
    {
        $program = $this->fetch_all_program();
        $notice = $this->fetch_all_notice();
        $event = $this->fetch_all_event();
        $blog = $this->fetch_all_blog();
    
        $data = array_merge($program, $notice, $event, $blog);
    
        return view('frontend.index', $data);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function notice()
    {
        $data = $this->fetch_all_notice();
        return view('frontend.notice',$data);
    }
    public function event()
    {
        $event = $this->fetch_all_event();
        return view('frontend.event',$event);
    }
}
