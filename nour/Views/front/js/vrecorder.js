document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM fully loaded and parsed");

    // Setup the recording and comment submission for each post
    document.querySelectorAll(".commentSection").forEach(function(section) {
        const form = section.querySelector("form");
        const uniqueId = form.dataset.postId; // Assuming data-post-id attribute is set on each form

        let mediaRecorder;
        let audioChunks = [];

        const startBtn = document.createElement('button');
        startBtn.type = "button";  // Explicitly set the button type to "button"
        startBtn.textContent = "Start Recording";
        startBtn.classList.add("start-recording"); 
        startBtn.classList.add("inactive");
        startBtn.onclick = () => startRecording(uniqueId);
        section.querySelector('.controllers').appendChild(startBtn);
        
        const stopBtn = document.createElement('button');
        stopBtn.type = "button";  // Explicitly set the button type to "button"
        stopBtn.textContent = "Stop Recording";
        stopBtn.classList.add("stop-recording");
        stopBtn.onclick = () => stopRecording(uniqueId);
        section.querySelector('.controllers').appendChild(stopBtn);

        function startRecording(uniqueId) {
            startBtn.classList.toggle("active");
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(stream => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();
                    audioChunks = [];
                    mediaRecorder.ondataavailable = function (e) {
                        audioChunks.push(e.data);
                        
                    };
                })
                .catch(error => console.error("getUserMedia error:", error));
        }

        function stopRecording(uniqueId) {
            
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                startBtn.classList.remove("active");
                mediaRecorder.stop();
                mediaRecorder.onstop = () => {
                    const audioBlob = new Blob(audioChunks, {type: 'audio/ogg'});
                    const audioUrl = URL.createObjectURL(audioBlob);
                    const audioElement = document.createElement('audio');
                    audioElement.controls = true;
                    audioElement.src = audioUrl;
                    section.querySelector('.display-audio').appendChild(audioElement);
                    
                    let audioFormInput = section.querySelector("[name='audioFile']");
                    if (!audioFormInput) {
                        audioFormInput = document.createElement("input");
                        audioFormInput.type = "file";
                        audioFormInput.name = "audioFile";
                        audioFormInput.style.display = "none";
                        form.appendChild(audioFormInput);
                    }
                    const audioData = new File([audioBlob], "comment_audio.ogg", {type: 'audio/ogg'});
                    const dt = new DataTransfer();
                    dt.items.add(audioData);
                    audioFormInput.files = dt.files;
                };
            }
        }
    });
    function validerId_user_comment(form) {
        var id_userInput_comment = form.querySelector("[name='form_comment_id_user']");
        var id_user_comment = id_userInput_comment.value;
        var id_userError_comment = form.querySelector(".form_comment_user_idError");

        var regex = /^\d{1,8}$/;

        if (!regex.test(id_user_comment)) {
            id_userError_comment.innerText = id_user_comment.length === 0 ? "L'ID utilisateur est requis." : "L'ID utilisateur ne doit contenir que des chiffres et ne doit pas dépasser 8 chiffres.";
            id_userError_comment.style.color = "red";
            id_userInput_comment.style.borderColor = "red"; 
            console.log("Validation failed for ID user.");
            return false;
        } else {
            id_userError_comment.innerText = "Correct";
            id_userError_comment.style.color = "green";
            id_userInput_comment.style.borderColor = "green"; 
            console.log("Validation passed for ID user.");
            return true;
        }
    }

    function validerContenu_comment(form) {
        var contenuInput_comment = form.querySelector("[name='form_comment_contenu']");
        var contenu_comment = contenuInput_comment.value;
        var contenuError_comment = form.querySelector(".form_comment_contenuError");

        if (contenu_comment.trim() === "") {
            contenuError_comment.innerText = "Commentaire vide!";
            contenuError_comment.style.color = "red";
            contenuInput_comment.style.borderColor = "red"; 
            console.log("Validation failed for contenu.");
            return false;
        } else {
            contenuError_comment.innerText = "Correct";
            contenuError_comment.style.color = "green";
            contenuInput_comment.style.borderColor = "green"; 
            console.log("Validation passed for contenu.");
            return true;
        }
    }
    function handleFormSubmission(form) {
        const isUserIdValid = validerId_user_comment(form);
        const isContentValid = validerContenu_comment(form);
    
        if (isUserIdValid && isContentValid) {
            console.log("All validations passed. Processing audio upload and form data.");
            const formData = new FormData(form);
    
            // Check if there's an audio file and append it if exists
            const audioInput = form.querySelector("[name='audioFile']");
            if (audioInput && audioInput.files.length > 0) {
                formData.append('audioFile', audioInput.files[0]);
            }
    
            fetch(form.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log("Server Response:", data.message);
                alert(data.message);
                window.location.reload(); // Reload to update the page/state
            })
            .catch(error => console.error('Error:', error));
        } else {
            console.log("Form submission prevented due to validation errors.");
        }
    }

    document.body.addEventListener("submit", function (event) {
        if (event.target.matches(".commentSection form")) {
            console.log("Form submission attempted.");
            event.preventDefault();

            // Wait until the recording has stopped before handling form submission
            setTimeout(() => handleFormSubmission(event.target), 1000); // Delay to ensure mediaRecorder.onstop has finished
        }
    });
});
