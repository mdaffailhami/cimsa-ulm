import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

FilePond.registerPlugin(FilePondPluginImagePreview);

const initializeImagePond = (input, allowMultiple = false, maxFiles = 1) => {
    return FilePond.create(input, {
        allowMultiple: allowMultiple,
        maxFiles: maxFiles,
        allowImagePreview: true,
        acceptedFileTypes: ["image/*"],
        server: {
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            process: {
                url: "/api/image/upload", // Endpoint to handle the file upload
                method: "POST",
                withCredentials: false,
                onload: (response) => {
                    response = JSON.parse(response);
                    return response; // Return the file path to FilePond
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
