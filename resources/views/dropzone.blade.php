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
        <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone">
            @csrf
        </form>
       
    </div>
    <div>
        <button type="submit" id="submit" class="sm:mx-auto sm:w-sm sm:max-w-sm justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
    </div>
</main>
<!--<div class="flex min-h-full flex-col justify-center px-10 py-12 lg:px-8">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Dropzone Lav 10</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        
        
    </div>
</div>-->
@endsection

@section('js')
  
    //Dropzone.autoDiscover = false;

    Dropzone.options.dropzone = {
        autoProcessQueue: false,
        uploadMultiple: true,
        thumbnailWidth: 120,
        dictDefaultMessage: "Arrastre los archivos aquí",
        acceptedFiles: ".jpeg,.jpg,.pdf,.wav",
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar",
        init: function() {
            var submitBtn = document.querySelector("#submit");
            dropzone = this;
            console.log(dropzone);

            submitBtn.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                dropzone.processQueue();
            });

            this.on("success", 
                dropzone.processQueue.bind(dropzone)
            );
        },
        removedfile: function(file) {
            if (this.options.dictRemoveFile) {
                //return Dropzone.confirm("Etás seguro que deseas eliminar "+this.options.dictRemoveFile, function() {
					if(file.previewElement.id != ""){
						var name = file.previewElement.id;
					}else{
						var name = file.name;
					}
					console.log(name);

                    
				   

                //});    
            }
        }    
    };
    
    /*var dropzone = new Dropzone('#image-upload', {
        thumbnailWidth: 120,
        dictDefaultMessage: "Arrastre los archivos aquí",
        acceptedFiles: ".jpeg,.jpg,.pdf,.wav",
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar",

        init:function(){
            //obtener imagenes
            var myDropzone = this;
            console.log(myDropzone);
        }

    });*/

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

