
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles: '.png, .jpg, jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Remover archivo',
    maxFiles: 1,
    uploadMultiple: false,
    init: function(){
        let inputImg = document.querySelector('[name="image"]');
        if(inputImg.value.trim())
        {
            const image = {
                size:1234,
                name:inputImg.value,
            };
            this.options.addedfile.call(this, image);
            this.options.thumbnail.call(this, image, `/uploads/${image.name}`);
            image.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
});


dropzone.on('sending', (file, xhr, formData)=>{
    console.log(file);
    // console.log(xhr);
    // console.log(formData);
});

dropzone.on('success', (file, response)=>{
    console.log(response);
    let inputImg = document.querySelector('[name="image"]');
    inputImg.value = response.image;
});

dropzone.on('removedfile', (file)=>{
    let inputImg = document.querySelector('[name="image"]');
    inputImg.value="";
});
dropzone.on('error', (file, response)=>{
    console.log(response);
});

