@extends('layouts.app')
@section('content')


<h2>Subir Imágenes con Dropzone.js</h2>
@auth
<!-- Formulario Dropzone -->
<form action="{{ route('upload') }}" class="dropzone" id="galleryDropzone">
    @csrf
</form>

<!-- Botones de control -->
<div style="margin-top: 10px;">
    <button id="acceptBtn" disabled
            style=" color: black; padding: 10px; border: none; cursor: pointer;">
        ✅ Aceptar Subida
    </button>
    <button id="clearBtn" style=" color: black; padding: 10px; border: none; cursor: pointer;">
        ❌ Borrar Imágenes
    </button>
</div>
@endauth
<!-- Vista previa de imágenes antes de la subida -->
<div id="preview">

    <h3>Imágenes a Subir:</h3>
    <div id="image-gallery"></div>

</div>
<script>
    Dropzone.options.galleryDropzone = {
        paramName: "file",
        maxFilesize: 2, // Tamaño máximo en MB
        acceptedFiles: "image/*",
        autoProcessQueue: false, // No subir automáticamente
        dictDefaultMessage: "Arrastra y suelta imágenes aquí o haz clic para subir",
        init: function () {
            let myDropzone = this;

            // Cuando se agrega un archivo
            this.on("addedfile", function (file) {
                document.getElementById("acceptBtn").disabled = false; // Habilitar botón Aceptar

                let img = document.createElement("img");
                img.src = URL.createObjectURL(file);
                img.style.width = "100px";
                img.style.margin = "10px";
                img.setAttribute("data-file", file.name);
                document.getElementById("image-gallery").appendChild(img);
            });

            // Subir archivos al hacer clic en "Aceptar"
            document.getElementById("acceptBtn").addEventListener("click", function () {
                myDropzone.processQueue();
            });

            // Borrar imágenes antes de la subida
            document.getElementById("clearBtn").addEventListener("click", function () {
                myDropzone.removeAllFiles(true);
                document.getElementById("image-gallery").innerHTML = "";
                document.getElementById("acceptBtn").disabled = true;
            });

            // Eliminar previsualización cuando se borra un archivo de Dropzone
            this.on("removedfile", function (file) {
                let images = document.querySelectorAll("#image-gallery img");
                images.forEach(img => {
                    if (img.getAttribute("data-file") === file.name) {
                        img.remove();
                    }
                });

                if (this.files.length === 0) {
                    document.getElementById("acceptBtn").disabled = true;
                }
            });

            // Mostrar imágenes subidas en la galería después de la subida
            this.on("success", function (file, response) {
                console.log("Imagen subida:", response.path);
            });
        }
    };
</script>

<!-- Imágenes ya subidas -->
<h3>Imágenes Subidas:</h3>

<div class="pswp-gallery" id="my-gallery">
    @foreach ($images as $image)
    <a href="{{ asset('storage/' . $image) }}"
       data-pswp-width="2500"
       data-pswp-height="1667"
       target="_blank">
        <img src="{{ asset('storage/' . $image) }}" width="200px" alt="imagen subida" />
    </a>
    @endforeach
</div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function () {
                    let container = this.closest(".image-container");
                    let imageName = container.getAttribute("data-image");

                    fetch("{{ route('galeria.destroy') }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({image: imageName})
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                container.remove(); // Eliminar la imagen del DOM
                            } else {
                                alert("Error al eliminar la imagen");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                });
            });
        });
    </script>

@endsection
