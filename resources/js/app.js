
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles: '.png, .jpg, jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Remover archivo',
    maxFiles: 1,
    uploadMultiple: false,
});


dropzone.on('sending', (file, xhr, formData)=>{
    console.log(file);
    // console.log(xhr);
    // console.log(formData);
});

dropzone.on('success', (file, response)=>{
    console.log(response);
});

dropzone.on('error', (file, response)=>{});

dropzone.on('removedfile', (file)=>{
    console.log(file);
});
