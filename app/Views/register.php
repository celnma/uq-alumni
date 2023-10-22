<style>
    .card-body{
        font-size:15px;
    }
    .form-outline input {
        font-size: 13px;
    }
    .form-outline label{
        font-size:13px;
    }

</style>


<section class="container mx-auto">

    <div class="col-6 mx-auto">

        <div class="card p-4 mt-4">
                <h4 class="card-title mx-4 px-1">Register form</h4>

                <?php echo form_open(base_url().'signup/save'); ?>

                <div class="card-body">

                    <?php 
                    
                    if(session()->getFlashData('error')) 
                    { 
                        echo '<div class="d-flex flex-row align-items-center mb-3 mx-2" style="color:#FF0000; font-size:13px">';
                        echo session()->getFlashData('error'); 
                        echo '</div>';
                    } ?>
                    
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <input name="firstName" required="required" type="text" class="form-control" placeholder="First name" />
                        </div>
                        <div class="form-outline flex-fill mx-2">
                            <input name="lastName" required="required" type="text" class="form-control" placeholder="Last name" />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <input name="email" required="required" type="email" class="form-control" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <input name="password" required="required" type="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mx-2">
                            <input name="cPassword" required="required" type="password" class="form-control" placeholder="Confirm password"/>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-5">
                        <div class="form-outline flex-fill mx-2">
                            <label class="form-label mx-1">ReCaptcha check:</label>
                            <div id="g-recaptcha-container"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-3">
                        <div class="form-outline d-flex mb-1 mx-auto">
                            <button class="btn btn-primary" style="font-size:13px" type="submit">Sign up</button>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-2">
                        <div class="form-outline flex-fill text-center mx-2">
                        <span style="font-size:13px">Already have an account ? Click here to <a class="text-center" href='<?php echo base_url(); ?>login'>sign in.</a> </span>
                        </div>
                    </div>
                    
                </div>

                <?php echo form_close(); ?>
        </div>
    </div>




</section>
</div>


<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha-container', {
          'sitekey' : '6LeGXR0mAAAAANn2xAdx2xYs-U-pTd2CFBY1Z2aF'
        });
      };
</script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer> </script>

</body>