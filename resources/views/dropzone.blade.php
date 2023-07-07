@extends('layouts.base')

@section('title')
 
@section('content')
<div class="min-h-full">
    <header class=bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-indigo-900">Dropzone</h1>
        </div>
    </header>
    <main class="bg-slate-50 space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <div id="image-upload" class="dz-default dz-message dropzoneDragArea">
                        <span>Subir Arcvhios</span>
                    </div>    
                </div>  
                <div>
                    <button type="submit" id="submit" class="flex sm:mx-auto sm:w-sm sm:max-w-sm justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                </div> 
            </form>
        </div>
        
    </main>
</div>
<!--<div class="flex min-h-full flex-col justify-center px-10 py-12 lg:px-8">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Dropzone Lav 10</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        
        
    </div>
</div>

<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->

  
@endsection

@section('js')
  
    
Dropzone.options.dropzone = {
    autoProcessQueue: false,
    uploadMultiple: true,
    thumbnailWidth: 200,
    //maxFiles: 1,
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
            return Dropzone.confirm("¿Está seguro que desea "+this.options.dictRemoveFile+"?", function() {
                
                if(file.previewElement.id != ""){
                    var name = file.previewElement.id;
                }else{
                    var name = file.name;
                }
                //console.log(name);

                $.ajax({
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          type: 'POST',
                          url: '{{ url("dropzone/delete") }}',
                          data: {filename: name},
                          success: function (data){
                              //alert(data.success +" File has been successfully removed!");
                          },
                          error: function(e) {
                            console.log(e);
                          }  
                }); 
                
                var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;

            });    
        }
    } 
};
    

@endsection
