<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Models\Content;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    // Generic method to fetch content by post type slug
    public function fetch_all_by_posttype_slug($slug)
    {
        return Content::with('postType') // Eager load the PostType relationship
            ->whereHas('postType', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->get();
    }

    // Fetch all programs
    public function fetch_all_program()
    {
        $data['programs'] = $this->fetch_all_by_posttype_slug('program');
        return $data;
    }

    // Fetch all notices
    public function fetch_all_notice()
    {
        $data['notices'] = $this->fetch_all_by_posttype_slug('notice');
        return $data;
    }

    // Fetch all events
    public function fetch_all_event()
    {
        $data['events'] = $this->fetch_all_by_posttype_slug('event');
        return $data;
    }

    // Fetch about-us content
    public function fetch_all_about()
    {
        $data['abouts'] = $this->fetch_all_by_posttype_slug('about-us');
        return $data;
    }
}
