<div class="container">
        <div class="h3">Settings</div> 
        <hr>
        </div>


        <div class="col">
                <div class="row d-flex justify-content-between px-3">
                        <div class="h5">Edit profile</div>
                </div>
                <?php echo form_open_multipart(base_url().'settings/update'); ?> 
                <div class="container mt-3">
                        <div class="row mx-auto d-flex">
                                <div class="form-group col p-1">
                                        <label for="name">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" value=<?php echo $firstName ?> required="required">
                                </div>
                                <div class="form-group col p-1">
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" value=<?php echo $lastName ?> required="required">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value=<?php echo $email ?> required="required">
                        </div>

                        <div class="form-group col p-1">
                                <label> Add your resume </label>
                                <div id="drag-drop-zone" style="
                                border: 2px dashed #bbb;
                                border-radius: 10px;
                                padding: 20px;
                                text-align: center;
                                font-size: 1.2em;
                                color: #bbb;">
                                
                                        <div class="input-group">
                                        <input type="file" id="file-input" name="resumeFile">
                                        </div>
                                </div>
                        </div>

                        <script>
                                const dragDropZone = document.getElementById("drag-drop-zone");

dragDropZone.addEventListener("dragover", event => {
  event.preventDefault();
  dragDropZone.classList.add("hover");
});

dragDropZone.addEventListener("dragleave", event => {
  dragDropZone.classList.remove("hover");
});

dragDropZone.addEventListener("drop", event => {
  event.preventDefault();
  dragDropZone.classList.remove("hover");
  dragDropZone.classList.add("active");

  const files = event.dataTransfer.files;
  handleFiles(files);
});

const fileInput = document.getElementById("file-input");

fileInput.addEventListener("change", event => {
  const files = fileInput.files;
  handleFiles(files);
});

// to check if files are loaded in console 
function handleFiles(files) {
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    console.log(file.name);
    dragDropZone.textContent = file.name;
  }
}

                        </script>

                    </div>
                        <div class="row mx-auto justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                </div>
                <?php echo form_close(); ?> 
        <div> 


    </div>