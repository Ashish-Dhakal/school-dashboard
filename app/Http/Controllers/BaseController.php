<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Models\Content;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    // for program to fetch the data
    public function fetch_all_posttype()
    {
        $data['postTypes'] = PostType::paginate(10);
        return $data;
    }

    public function fetch_all_program()
    {

        // $data['programs'] = Content::whereHas('postType', function ($query) {
        //     $query->where('slug', 'program');
        // })->get();

        $data['programs'] = Content::with('postType') // Eager load the PostType relationship
        ->whereHas('postType', function ($query) {
            $query->where('slug', 'program');
        })->get();
    
        return $data;
    }


    public function fetch_all_notice()
    {
        // $data['notices'] = Content::whereHas('postType', function ($query) {
        //     $query->where('slug', 'notice');
        // })->get();
        $data['notices'] = Content::with('postType') // Eager load the PostType relationship
        ->whereHas('postType', function ($query) {
            $query->where('slug', 'notice');
        })->get();
        return $data;
    }

    public function fetch_all_event()
    {
        // $data['events'] = Content::whereHas('postType', function ($query) {
        //     $query->where('slug', 'event');
        // })->get();


        $data['events'] = Content::with('postType') // Eager load the PostType relationship
        ->whereHas('postType', function ($query) {
            $query->where('slug', 'event');
        })->get();
        return $data;
    }

    public function fetch_all_about()
    {
        $data['abouts'] = Content::whereHas('postType', function ($query) {
            $query->where('slug', 'about-us');
        })->get();
        return $data;
    }
}
