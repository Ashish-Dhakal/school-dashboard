<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\PostType;
use Illuminate\Http\Request;

class ProgramController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('program.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retrive all the posttype name
        $data['posttypes'] = PostType::all();
        $data['galleries'] = Gallery::all() ;
        return view('program.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
