    <section id="register-page-section">
    	<div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                	<div class="register-area">
                		<h3 class="title-bar"><span>Register</span> <em style="text-align: center;"><?php echo $this->session->flashdata("msg"); ?></em></h3>
                		<form action="<?php echo base_url(); ?>tv/insert_rdata" method="post">
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Name : </label>
								<div class="col-xs-6">
									<input class="form-control" name="name" value="<?php echo set_value("name"); ?>" type="text" id="example-text-input">
									<span style="color: red;"><?php echo form_error("name"); ?></span>
								</div>
							</div>
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Email : </label>
								<div class="col-xs-6">
									<input class="form-control" name="email" value="<?php echo set_value("email"); ?>" type="email" id="example-email-input">
									<span style="color: red;"><?php echo form_error("email"); ?></span>
								</div>
							</div>
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Password : </label>
								<div class="col-xs-6">
									<input class="form-control" name="password" type="password" id="firstpass" id="example-password-input">
									<span style="color: red;"><?php echo form_error("password"); ?></span>
								</div>
							</div>
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Re-password : </label>
								<div class="col-xs-6">
									<input class="form-control" name="repassword" type="password" id="repass" onkeyup="checkPasswordMatch();"  id="example-password-input">
									<span style="color: red;"><?php echo form_error("repassword"); ?></span>
								</div>
								<div class="col-xs-4">
									<div style="padding-top:10px;" id="msg"></div>
								</div>
							</div>
							<script type="text/javascript">
								function checkPasswordMatch() {
								    var password = $("#firstpass").val();
								    var confirmPassword = $("#repass").val();

								    if (password != confirmPassword){
								        $("#msg").html("Passwords do not match!");
								        return false;
								    }else{
								        $("#msg").html("Passwords match.");
								         return true;
								    }
								}
							</script>
							<div class="radio fr-radio">
								<label for="example-text-input" class="col-xs-2 col-form-label"></label>
								<div class="col-xs-10">
								  <label class="fr-male">
									<input name="gender" id="optionsRadios2" value="male" type="radio">
									Male
									
								  </label>
								  <label class="fr-female">
									<input name="gender" id="optionsRadios2" value="female" type="radio">
									Female
								  </label>
							 	 	<span style="color: red; margin-left:25px; "><?php echo form_error("gender"); ?></span>
								</div>
							</div>
                			<div class="form-group row">
                				<label for="example-text-input" class="col-xs-2 col-form-label"></label>
								<div class="col-xs-10">
									<button type="submit">Submit</button>
								</div>
							</div>
                		</form>
                		
                	</div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                	<div class="login-area">
                		<h4 class="title-barr"><span>Login</span></h4>
                		<form action="<?php echo base_url(); ?>tv/check_r" method="post">
                			<div class="form-group row">
								<div class="col-xs-12">
									<?php $emsg = $this->session->flashdata("emsg"); echo "<p style='color: #EE3224; padding-bottom:7px;'>".$emsg."</p>"; ?>
									<input class="form-control" name="email" type="email" placeholder="Your Email" id="example-email-input">
								</div>
							</div>
                			<div class="form-group row">
								<div class="col-xs-12">
									<input class="form-control" name="password" placeholder="Password" type="password" id="example-password-input">
								</div>
							</div>
                			<div class="form-group row">
								<div class="col-xs-12">
									<button type="submit">Submit</button>
								</div>
							</div>
                		</form>
                	</div>
                </div>
            </div>
        </div>
    </section>