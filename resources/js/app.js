import "./bootstrap";
import Swal from "sweetalert2";

import "choices.js/public/assets/styles/choices.css";
import Choices from "choices.js";

import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

import "./modules/ckeditor";

// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);

window.Swal = Swal;
window.Choices = Choices;
window.FilePond = FilePond;
