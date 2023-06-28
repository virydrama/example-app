<?php

namespace App\Http\Controllers;

//use App\Models\Archivo;
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
        $files = $request->file('file');
        foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            //dd($fileName);
            $file->move(public_path('images'), $fileName);

            $dropzone = new Dropzone;
            
            $dropzone->nombre = $fileName;
            
            $dropzone->save();
            //return response()->json(['success'=>$filename]);
        }



        /*$image = $request->file('file');

        $imageName = $image->getClientOriginalName();
        dd($image);
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $file_name= $filename.'.'.$extension;
        $image->move(public_path('images'),$file_name);

        /*$imageUpload = new Archivos;
        $imageUpload->nombre = $filename;
        //$imageUpload->nombre = $file_name;
        $imageUpload->save();
        return response()->json(['success'=>$filename]);*/
     
        //return response()->json(['success'=>$imageName]);

        //$image = $request->file('file');
        
        //$image->move('images');*/
    
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
    public function destroy(Request $request)
    {
        $filename =  $request->get('filename');
        //dd("aqui");
        Dropzone::where('nombre',$filename)->delete();
        $path = public_path('images/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success'=>$filename]);
    }    
}
