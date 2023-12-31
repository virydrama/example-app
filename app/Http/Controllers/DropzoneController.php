<?php

namespace App\Http\Controllers;

//use App\Models\Archivo;
use App\Models\Dropzone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        
        $nombre = $request->nombre;
        //dd($nombre);
        $files = $request->file('file');
        foreach($files as $file){
           //dd($file); 
            $fileName = $file->getClientOriginalName();
            $extension = $file->extension();
            $imageSize = $file->getSize();

            $size = number_format($imageSize / 1048576,2).' MB';
            //dd($size);
            $nombre = 'nombre_completo';
            $path = public_path('uploads/cp/'.$nombre);
            //dd($path);
            if(!File::exists($path)){
                File::makeDirectory($path, 0777, true);
            }
            $file->move($path, $fileName);

            $dropzone = new Dropzone;
            $dropzone->nombre = $fileName;
            $dropzone->tipo = $extension;
            $dropzone->peso = $size;
            $dropzone->url = $path;

           
            $dropzone->save();
            //return response()->json(['success'=>$filename]);
    
        }
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
        //dd($filename);
        $nombre = 'nombre_completo';
        Dropzone::where('nombre',$filename)->delete();
        $path = public_path('uploads/cp/').$nombre.'/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success'=>$filename]);
    }    
}
