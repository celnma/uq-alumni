<div class="container p-5">
        <div class="container">
            <div class="row p-3">
                <div class="col-lg-6 col-md-8 mx-auto bg-light border">

                <?php echo form_open(base_url().'signup/save'); ?>

                    <div class="row text-center p-2 m-3">
                        <span class="h4 p-2 mt-3 mx-auto"> Create an account </span>
                    </div>
                    <?php if (isset($success)) : ?>
                        <div class="alert mx-auto p-2 alert-success" style="max-width:300px"><?= $success ?></div>
                    <?php endif ?>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="text" name="firstName" placeholder="First name" required="required">
					</div>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="text" name="lastName" placeholder="Last name" required="required">
					</div>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="email" name="email" placeholder="Email address" required="required">
					</div>
					<div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="password" name="password" placeholder="Password" required="required">
					</div>
                    <div class="form-group mx-auto m-2" style="max-width:300px">
						<input class="form-control" type="password" name="cPassword" placeholder="Confirm password" required="required">
					</div>
                    <?php if(isset($validation)):?>
                        <div class="alert mx-auto p-2 alert-danger" style="max-width:300px"><?= $validation->listErrors() ?></div>
                    <?php endif;?>
                    <div class="form-group text-center mt-3">
                        <button class="btn btn-primary" style="width:100%; max-width:300px" type="submit">Sign up</button>
                    </div>
                    <div class="clearfix mx-auto text-center mt-5 mb-3">
						You have an account ? <a class="text-center" href='<?php echo base_url(); ?>login'>Login</a>
				    </div>
                 <?php echo form_close(); ?>
                 
            </div>
         </div>
    </div>
</div>
