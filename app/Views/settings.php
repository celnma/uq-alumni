<style>
        .user-profile-picture {
                width:120px;
                height:120px;
                border:1px solid #C5C5C5;
                border-radius:50%;
                object-fit:cover;
        }

        #input-pp {
                display:none;
        }

        #input-pp-btn {
                border: 1px solid #363359;
                padding: 8px;
                color:#363359;
        }
        #input-pp-btn:hover {
                padding: 8px;
                color: #fff;
                border:none;
        }

        .card-body .item {       
                background-color:#E3E6ED;
                height:58px; 
                width:58px; 
                border-radius:80px
        }
        .card-body .item span {
                font-size: 40px; 
                color:#363359
        }
        .card-body .item i {
                margin-left:1px;
        }
        #download-btn {
                height:40px;
                width:48px;
                color:#363359;
                border: 1px solid #363359;
        }
        #download-btn:hover {
                color: #fff;
                border:none
        }
        .card-body .btn-outline-primary span {
                font-size:23px;
        }

</style>

<section class="main col" style="margin:1%">

    <div class="container my-3">
        <h3>Settings</h3>
    </div>
    
    <hr>

       <div class="container mx-auto m-3">
                <div class="col mx-auto">
                        <div class="card p-4 mt-4">
                                <h4 class="card-title mx-4 px-1 mt-2">
                                        Edit your profile
                                </h4>
                                <hr class="m-2 px-0">
             
                                <div class="card-body">


                                        <div class="d-flex flex-column mb-4">
                                                <div class="form-outline d-flex mx-2">   
                                                        <img id='img-picture' src=<?php echo '/alumni/writable/uploads/picture/'.$picture_file ?> alt="Profile Picture" class="user-profile-picture mr-3">
                                                        <input name="profilePicture" id="input-pp" type="file">
                                                        <label for="input-pp" id="input-pp-btn" class="btn btn-outline-primary align-self-center mx-3">Update your picture</label>
                                                </div>
                                        </div>


                                        <?php echo form_open_multipart(base_url().'settings/update'); ?>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                                <div class="form-outline flex-fill mx-2">
                                                        <label class="mb-1" for="firstName">First name</label>
                                                        <input name="firstName" required="required" type="text" class="form-control" value=<?php echo $firstName ?>>
                                                </div>
                                                <div class="form-outline flex-fill mx-2">
                                                        <label class="mb-1" for="lastName">Last name</label>
                                                        <input name="lastName" required="required" type="text" class="form-control" value=<?php echo $lastName ?>>
                                                </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                                <div class="form-outline flex-fill mx-2">
                                                        <label class="mb-1" for="email">Email</label>
                                                        <input name="email" required="required" type="email" class="form-control" value=<?php echo $email ?>>
                                                </div>
                                        </div>
                                        
                                        
                                        <div class="d-flex flex-row align-items-center mb-3">
                                                <div class="form-outline flex-fill mx-2">
                                                        <label class="mb-1" for="resume">Update your resume</label>
                                                        
                                                        <div class="card mx-auto my-2">
                                                                <div class="card-body row justify-content-between mx-2 p-2 ">
                                                                        <div class="row px-2">
                                                                                <div class="item align-self-center ml-2 my-1 px-2 pb-0">
                                                                                        <span><i class="bx bx-file align-self-center pt-2"></i></span>
                                                                                </div>
                                                                                <div class="mx-3 align-self-center">
                                                                                        <a href=<?php echo base_url('settings/view_file/').$resume_file ;?> target=".blank" inline="true" type="application/pdf">
                                                                                                <?php echo "Resume_".$firstName."_".$lastName.".pdf" ;?>
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                        <div class="align-self-center ml-2 my-1 px-3 pb-0">
                                                                                <a href=<?php echo base_url('settings/download/').$resume_file ;?> class="btn btn-outline-primary" id="download-btn"><span><i class="bx bxs-download"></i></span></a>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                                        
                                                        <div class="input-group">
                                                                <input class="custom-file-input" type="file" name="resume">
                                                                <label class="custom-file-label" for="resume"> Choose a file...
                                                                </label>
                                                        </div>
                                                </div>   
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                                <div class="form-outline flex-fill mx-2 mt-3">
                                                <button class="btn btn-primary" type="submit" download>Update profile</button>  
                                                </div>
                                        </div>
                                        <?php echo form_close(); ?> 
                                </div>
                                

                        </div>
                </div>
        </div>          
                

</section>
</div>

<script>
        $(document).ready(function() {
                $('#input-pp').on('change', function() {
                        var file = this.files[0];
                        var formData = new FormData();
                        formData.append('profilePicture', file);
                        $.ajax({
                                url: "<?php echo base_url().'settings/update_picture'; ?>",
                                method: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                        if(response!="error") {
                                                var updatedPictureUrl = "<?php echo '/alumni/writable/uploads/picture/'?>" + response;
                                                $('#img-picture').attr('src', updatedPictureUrl);
                                        }
                                }
                        }) 
                });
        })
</script>


</body>

