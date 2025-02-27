import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";

import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFileValidateSize);
FilePond.registerPlugin(FilePondPluginFileValidateType);

const initializeImagePond = (input, allowMultiple = false, maxFiles = 1) => {
    return FilePond.create(input, {
        allowMultiple: allowMultiple,
        maxFiles: maxFiles,
        allowImagePreview: true,
        acceptedFileTypes: ["image/png", "image/jpeg"],
        labelFileTypeNotAllowed : "Format file tidak tepat",
        fileValidateTypeLabelExpectedTypes : "Hanya dapat menerima file png, jpg, jpeg",
        maxFileSize: "1MB",
        labelMaxFileSizeExceeded : "Size file terlalu besar",
        labelMaxFileSize : "Besar maksimal {filesize}",
        server: {
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            process: {
                url: "/api/image/upload", // Endpoint to handle the file upload
                method: "POST",
                withCredentials: false,
                onload: (response) => {
                    try {
                        const parsedResponse = JSON.parse(response);
                        return parsedResponse;
                    } catch (error) {
                        console.error("Invalid JSON response:", response);
                        return null;
                    }
                },
                onerror: (response) => {
                    console.error("Error uploading file:", response);
                },
            },
            revert: {
                url: "/api/image/revert", // Endpoint to revert/remove the uploaded file
                method: "POST",
                withCredentials: false,
                onload: (response) => {
                    // Handle the revert response
                    console.log("Revert response:", response);
                },
                onerror: (response) => {
                    console.error("Error reverting file:", response);
                },
            },
            load: (source, load, error) => {
                // Manually construct the correct image URL
                const url = `/api/image/${source}`; 
            
                // Fetch the image
                fetch(url)
                    .then((response) => {
                        if (!response.ok) throw new Error("Failed to load");
                        return response.blob();
                    })
                    .then(load)
                    .catch((err) => {
                        console.error("Error loading file:", err);
                        error(err);
                    });
            },
        },
    });
};

window.initializeImagePond = initializeImagePond;
