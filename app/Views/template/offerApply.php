<style>
    #offer-update-at {
        color: #808080;
    }
    .drag-and-drop {
        border: 1px solid #d3d3d3;
        border-radius: 5px;
        padding: 15px;
        text-align: center;
        /* font-size: 15px; */ 
    }
    .drag-and-drop.active {
        border: 1px solid #695CFE;
    }

    input[type=file]::file-selector-button {
        border: none;
        border-radius: 5px;
    }

</style>


<section class="main col" style="margin:1%">

    <div class="container my-3">


            <?php echo form_open_multipart(base_url().'offer/apply/submit/'.$id); ?>
            <div class="card p-4 mt-4">
                <h4 class="card-title mx-4 px-1 mt-2" id="offer-title">
                        <?php echo $title ;?>
                </h4>
                <div class="d-flex flex-column mx-4 px-1 mb-3">
                    <span class="mb-1" id="offer-company"><?php echo $company ;?></span>
                    <span class="mb-1" id="offer-location"> <?php echo $city.", ".$state.", ".$country ;?></span>
                    <span class="mt-2 mb-1" id="offer-update-at"> <?php echo $updated_at ;?></span>
                </div>
                
                <hr class="m-2 px-0">

                <div class="card-body">
                    <div class="d-flex flex-column mb-3">
                        <h5 class="pb-2"> Complete your profile </h5>
                        <p>Please submit your resume for this offer. <br> A cover letter is optional but recommended. </p>
                    </div>
                    
                    <div class="d-flex flex-column mb-3">
                            <label class="mb-2"> Upload your resume </label>  
                            <div id="drag-and-drop" class="drag-and-drop">
                                <div class="input-group d-flex flex-column align-items-center">
                                        <label for="resume_file" id="input-file-name">Drop file here</label>
                                        <span> or </span>
                                        <input type="file" class="input-file" id="input-file" name="resume_file" />
                                </div>
                            </div>
                    </div>
                    

                   <!--  <div class="d-flex flex-column mb-3">
                            <label class="mb-2"> Upload your cover letter (optional) </label>  
                            <div class="input-group">
                                 <input type="file" class="custom-file-input" id="offerFile" name="cover_letter"> 
                                <label class="custom-file-label">Choose a file...</label>
                            </div>
                    </div> -->
                    <div class="d-flex pt-3 mb-3">
                        <button class="btn btn-primary" id='submit-btn' type="submit" disabled>Submit application</button>  
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
    </div>
</section>

<script>
        const dragZone = document.getElementById('drag-and-drop');
        const dragLabel = document.getElementById('input-file-name');

        dragZone.addEventListener("dragover", event => {
                event.preventDefault();
                dragLabel.textContent = "Release to upload";
                dragZone.classList.add('active');
        })
        dragZone.addEventListener("dragleave", event => {
                dragLabel.textContent = "Drag & Drop";
                dragZone.classList.remove('active');
        })
        dragZone.addEventListener("drop", event => {
                event.preventDefault();
                dragZone.classList.remove('active');
                var file = event.dataTransfer.files[0];
                var fileList = new DataTransfer();
                fileList.items.add(file);
                document.getElementById('input-file').files = fileList.files;
                dragLabel.textContent = "Drag & Drop";
                $('#submit-btn').prop('disabled', false);
        })
</script>

</body>