<div class="container p-5">
     <div class="container">
        <div class="row p-3 m-2">
				
			<div class="col-lg-6 col-md-8 mx-auto gap-2 p-3 bg-light border">
                   
            <?php echo form_open(base_url().'login/reset_password'); ?>
                <div class="col mx-auto">
                    <div class='text-center p-2 m-3'>
                        <span class="h4">Reset password </span>
                    </div>
                    <div class="text-center mb-4">
                            <p>Please enter your email address to reset your password.</p>
                    </div>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="email" name="email" placeholder="Email address" required="required">
					</div>
                    <div class="form-group text-center mt-3">
                        <button class="btn btn-primary" type="submit">Send email</button>
                    </div>
                    <div class="form-group text-center mt-5">
                        Ready to login ? <a class="text-center" href='<?php echo base_url(); ?>login'>Click here</a>
                    </div>
                </div>
            <?php echo form_close() ?>

            </div>
				
        </div>
    </div>
</div>


</div>