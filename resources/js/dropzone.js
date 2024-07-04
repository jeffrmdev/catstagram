// If you are using JavaScript/ECMAScript modules:
import Dropzone from "dropzone";

// If you are using an older version than Dropzone 6.0.0,
// then you need to disabled the autoDiscover behaviour here:
Dropzone.autoDiscover = false;

/*let myDropzone = new Dropzone("#dropzone");
myDropzone.on("addedfile", file => {
  console.log(`File added: ${file.name}`);
});*/
if(document.getElementById("dropzone")){
  const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "Arrastra tu foto",
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    dictRemoveFile: "Quitar foto",
    maxFiles: 1,
    uploadMultiple: false,
    thumbnailWidth: 1000,
    thumbnailHeight: 1000,
    init:function(){
      if(document.querySelector('[name="image"]').value.trim()){
        this.removeAllFiles();
        const imagePublish = {};
        imagePublish.name = document.querySelector('[name="image"]').value;
        this.options.addedfile.call(this, imagePublish);
        this.options.thumbnail.call(this, imagePublish, `/uploads/${imagePublish.name}`);
        imagePublish.previewElement.classList.add('dz-success', 'dz-complete');
        document.querySelector('.dz-button').classList.add("oculto");
      }
    },
  });

  dropzone.on('success', function(file, response){
    //document.getElementById('image').value = response.image;
    document.querySelector('[name="image"]').value = response.image;
  });
  
  dropzone.on('removedfile', function(file, response){
    document.querySelector("[name='image']").value = "";
  });
  
  dropzone.on("maxfilesexceeded", function(file)
  {
      this.removeFile(file);
  });

}

