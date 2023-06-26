@extends('layouts.base')

@section('title')
 
@section('content')
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dropzone</h1>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
            @csrf
        </form>
    </div>
  </main>
<!--<div class="flex min-h-full flex-col justify-center px-10 py-12 lg:px-8">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Dropzone Lav 10</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        
        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
    </div>
</div>-->
@endsection

@section('js')
  
    Dropzone.autoDiscover = false;
    
    var dropzone = new Dropzone('#image-upload', {
        thumbnailWidth: 120,
        dictDefaultMessage: "Arrastre los archivos aquí",
        acceptedFiles: ".jpeg,.jpg,.pdf,.wav",
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar"

        /*init:function(){
            var
        }*/

    });

    /*const dropzone = $("$image-upload").dropzone({
        uploadprogress: function(file, progress, byteSent) {
            $("button[type=submit]").prop('disabled',true);
        },
        thumbnailWidth: 120,
        dictDefaultMessage: "Arrastre los archivos aquí",
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.pdf,.wav",
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar"

    });*/


    

@endsection

