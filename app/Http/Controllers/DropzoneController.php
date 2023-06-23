<?php

namespace App\Http\Controllers;

use App\Models\Dropzone;
use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dropzone');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('file');

        $imageName = $request->file('file')->getClientOriginalName();
        
        $image->move(public_path('images'),$imageName);
     
        return response()->json(['success'=>$imageName]);

        //$image = $request->file('file');
        
        //$image->move('images');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Dropzone $dropzone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dropzone $dropzone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dropzone $dropzone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dropzone $dropzone)
    {
        //
    }
}
