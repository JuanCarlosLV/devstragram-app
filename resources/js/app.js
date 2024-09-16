import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
});


dropzone.on('sending', function(file, xhr, formData){
    console.log(formData)
})

dropzone.on('success', function(file, response){
    console.log(response)
    alert("Se subio correctamente la imagen")
});