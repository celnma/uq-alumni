<div class="container p-5">
     <div class="container">
        <div class="row p-3 m-2">
				
			<div class="col-lg-6 col-md-8 mx-auto gap-2 p-3 bg-light border">
                   
            <?php echo form_open(base_url().'/user/update_password'); ?>
                <div class="col mx-auto">
                    <div class='text-center p-2 m-3'>
                        <span class="h4">Reset password</span>
                    </div>
                    <div class="text-center mb-4">
                            <p>Please enter your new password.</p>
                    </div>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="password" name="password" placeholder="New password" required="required">
					</div>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="password" name="cPassword" placeholder="Confirm password" required="required">
					</div>
                    <?php if(isset($validation)):?>
                        <div class="alert mx-auto p-2 alert-danger" style="max-width:300px"><?= $validation->listErrors() ?></div>
                    <?php endif;?>
                    <div class="form-group text-center mt-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
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