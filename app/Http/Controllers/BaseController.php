<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    // for program to fetch the data
    public function fetch_all_program(){
        $data['postTypes'] = PostType::paginate(10);
        return $data;
    }
}
