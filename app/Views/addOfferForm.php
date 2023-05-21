<style>
    .form-outline input {
        font-size: 15px;
    }
</style>


<section class="main col">

    <div class="container my-3">
        <h3>Career</h3>
    </div>
    
    <hr>

    <div class="container mx-auto m-3">

        <div class="col mx-auto">

            <div class="card p-4 mt-4">
                <h4 class="card-title mx-4 px-1 mt-2">
                    Add your offer
                </h4>
                <hr class="m-2 px-0">
                <?php echo form_open_multipart(base_url().'career/add_offer_form/save'); ?>
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1" for="title">Title</label>
                            <input name="title" required="required" type="text" class="form-control"/>
                        </div>
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1" for="company">Company name</label>
                            <input name="company" required="required" type="text" class="form-control"/>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1" for="city">City</label>
                            <input name="city" required="required" type="text" class="form-control"/>
                        </div>
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1" for="state">State</label>
                            <input name="state" required="required" type="text" class="form-control"/>
                        </div>
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1" for="country">Country</label>
                            <input name="country" required="required" type="text" class="form-control"/>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1" for="description">Description</label>
                            <textarea name="description" required="required" type="text" row="20" class="form-control"/> </textarea>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <label class="mb-1"> Add optional file </label>
                            <div class="input-group">
                                <input class="custom-file-input" type="file" id="offerFile" name="offerFile"> 
                                <label class="custom-file-label" for="offerFile">Choose a file...</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2 mt-3">
                            <button class="btn btn-primary" type="submit">Post your offer</button>  
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?> 
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('offerFile').addEventListener('change', function(){
        var fileName = document.getElementById('offerFile').value;
        var lastIndex = fileName.lastIndexOf("\\"); // get last index of \ character
        if (lastIndex >= 0) {
            fileName = fileName.substring(lastIndex + 1); // extract the file name
        }
        var label = document.querySelector('.custom-file-label');
        label.textContent = fileName;
    });
</script>

</body>


<!-- <div class="row">
            <div class="col">
                <div class="text-center p-2">
                    <h5>Add an job offer for UQ student and alumni</h> 
                </div>

                

                <form class="mt-3">
                    <div class="row mx-auto d-flex">
                        <div class="form-group col p-1">
                            <label for="jobTitle">Job title</label>
                            <input type="text" class="form-control" id="jobTitle" name="title" required="required">
                        </div>
                        <div class="form-group col p-1">
                            <label for="jobCompanyName">Company name</label>
                            <input type="text" class="form-control" id="jobCompanyName" name="company" required="required">
                        </div>
                    </div>
                    <div class="row mx-auto d-flex">
                        <div class="form-group col p-1">
                            <label for="jobCity">City</label>
                            <input type="text" class="form-control" id="jobCity" name="city" required="required">
                        </div>
                        <div class="form-group col p-1">
                            <label for="jobState">State</label>
                            <input type="text" class="form-control" id="jobState" name="state" required="required">
                        </div>
                        <div class="form-group col p-1">
                            <label for="jobCountry">Country</label>
                            <input type="text" class="form-control" id="jobCountry" name="country" required="required">
                        </div>
                    </div>
                    <div class="row mx-auto form-group">
                        <label for="jobDescription" class="form-label">Job description</label>
                        <textarea type="text" class="form-control" id="jobDescription" name="description" rows="8" required="required"></textarea>  
                    </div>
                    <div class="row mx-auto form-group">
                        <label> Add optional file </label>
                       <div class="input-group">
                           <input type="file" class="custom-file-input" id="offerFile" name="userFile">
                           <label class="custom-file-label" for="offerFile">Choose a file...</label>
                        </div>
                        
                        

                    </div>

                    <div class="row mx-auto justify-content-center mt-4">
                        <button class="btn btn-primary" type="submit">Submit</button>                        
                    </div>
                </form>

                

            </div>
        </div>
    </div>
</div> --> 

