@extends('layouts.base')

@section('title', 'Page Title')
 
@section('content')
    <p>Dropzone Lav 10</p>
    <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
        @csrf
        <div>
        </div>
    </form>
@endsection

@section('script')
  
    Dropzone.autoDiscover = false;
    
    var dropzone = new Dropzone('#image-upload', {
        thumbnailWidth: 120,
        dictDefaultMessage: "Arrastre los archivos aquí",
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.pdf,.wav",
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar",

        /*init:function(){
            var
        }*/
    });


    

@endsection

