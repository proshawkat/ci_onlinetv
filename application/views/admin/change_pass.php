<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?php echo $user->user_name; ?></li>
				<li class="active"><?php echo $user->email; ?></li>
			</ol>
		</div><!--/.row-->
		
			<style type="text/css">
				.my-panel{
					margin-top: 30px;
				}
				.fixed-table-loading{
					display: none;
				}
				.glyphicon {
				  display: inline-block;
				  font-family: "Glyphicons Halflings";
				  font-style: normal;
				  font-weight: 400;
				  line-height: 1;
				  position: relative;
				  top: 3px;
				  float: right;
				  color: #EE3224;
				}
			</style>	
		
		<div class="row">
			<div class="col-lg-2">
			</div>
			<div class="col-lg-7">
				<div class="panel panel-default my-panel">
					<div class="panel-heading"><?php echo $this->session->flashdata("msg"); ?></div>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo base_url(); ?>settings/update_password" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password</label>
									<div class="col-md-6">
										<input id="name" name="password" type="password" class="form-control">
										<span style="color: red;"><?php echo form_error("password"); ?></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">New Password</label>
									<div class="col-md-6">
										<input id="new_pass" name="new_pass" type="password" class="form-control">
										<span style="color: red;"><?php echo form_error("new_pass"); ?></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Confirm Password</label>
									<div class="col-md-6">
										<input id="cpass" name="cpass" type="password" class="form-control">
										<span style="color: red;"><?php echo form_error("cpass"); ?></span>
									</div>
									<div class="col-md-3">
										<div style="color:#000;" id="msg"></div>
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-9 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Submit</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		<script type="text/javascript">
			function checkPasswordMatch() {
			    var password = $("#new_pass").val();
			    var confirmPassword = $("#cpass").val();

			    if (password != confirmPassword){
			        $("#msg").html("Passwords do not match!");
			        return false;
			    }else{
			        $("#msg").html("Passwords match.");
			         return true;
			    }
			}
		</script>
		
</div><!--/.main-->