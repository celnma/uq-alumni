<div class="container p-5">
        <div class="container">
            <div class="row p-3 m-2">
				
				<div class="col-lg-6 col-md-8 mx-auto gap-2 p-3 bg-light border">
					
					<?php echo form_open(base_url().'login/check_login'); ?>
					<div class="col mx-auto">
						<div class='text-center p-2 m-3'>
							<span class="h4 p-2">Welcome! </span>
						</div>
						<div class="form-group mx-auto" style="max-width:300px">
							<input class="form-control" type="text" name="email" placeholder="Email address" required="required">
						</div>
						<div class="form-group mx-auto" style="max-width:300px">
							<input class="form-control" type="password" name="password" placeholder="Password" required="required">
						</div>
						<?php echo $error; ?>
						<div class="form-group text-center">
							<button class="btn btn-primary" style="width:100%; max-width:300px" type="submit">Login</button>
						</div>
						
						<div class="form-group text-center mb-4">
							<p> Not registered yet ? <br> <a href='<?php echo base_url(); ?>signup'> Sign up here </a></p> 
						</div>		
						
						
						<div class="clearfix">
							<label class="float-left form-check-label">
								<input type="checkbox" name="remember"> Remember me
							</label>
							<a href=<?php echo base_url('login/forgot_password') ?> class="float-right">Forgot Password ?</a>
							
						</div>
						<?php echo form_close(); ?>
					</div>
					
                </div>
				
            </div>
        </div>
    </div>
</div>







