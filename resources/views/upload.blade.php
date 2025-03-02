

<form action="{{ route('upload.image') }}" class="dropzone" id="image-dropzone">
    @csrf
</form>
<script>
    Dropzone.options.imageDropzone = {
        paramName: "file",
        maxFilesize: 2, // Tamaño máximo en MB
        acceptedFiles: "image/*",
        success: function(file, response) {
            console.log("Imagen subida:", response.url);
        }
    };
</script>
