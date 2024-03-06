// If you are using JavaScript/ECMAScript modules:
import Dropzone from "dropzone";

// If you are using an older version than Dropzone 6.0.0,
// then you need to disabled the autoDiscover behaviour here:
Dropzone.autoDiscover = false;

/*let myDropzone = new Dropzone("#dropzone");
myDropzone.on("addedfile", file => {
  console.log(`File added: ${file.name}`);
});*/

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: "Arrastra tu foto",
  acceptedFiles: ".png, .jpg, .jpeg, .gif",
  addRemoveLinks: true,
  dictRemoveFile: "Quitar foto",
  maxFiles: 1,
  uploadMultiple: false,
});

