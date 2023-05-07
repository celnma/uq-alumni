<div class="container">
    <div class="h3">Career</div> 
    <hr>

    <div class="container mx-auto">
        <div class="row">
            <div class="col">
                <div class="text-center p-2">
                    <h5>Add an job offer for UQ student and alumni</h> 
                </div>

                <?php echo form_open_multipart(base_url().'career/add_offer_form/save'); ?>

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

                    </div>

                    <div class="row mx-auto justify-content-center mt-4">
                        <button class="btn btn-primary" type="submit">Submit</button>                        
                    </div>
                </form>

                <?php echo form_close(); ?> 

            </div>
        </div>
    </div>

</div>
</body>