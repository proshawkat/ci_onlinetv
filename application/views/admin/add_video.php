		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Add Video </div>
				<div class="panel-body">
					<form class="form-horizontal" action="<?php echo base_url(); ?>dashboard/insert_video" method="post">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<fieldset>
							<!-- Name input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Category Name</label>
								<div class="col-md-8">

									<select name="cate_id" class="form-control">
										<option>Select Name</option>
										<?php foreach ($category as $v):?>
											<option value="<?php echo $v->cate_id; ?>"><?php echo $v->cate_name; ?></option>
										<?php endforeach; ?>
									</select>
									<span style="color: red;"><?php echo form_error("cate_id"); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Title</label>
								<div class="col-md-8">
									<input id="name" name="title" type="text" class="form-control">
									<span style="color: red;"><?php echo form_error("title"); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Video Id</label>
								<div class="col-md-8">
									<input id="name" name="video" type="text" class="form-control">
									<span style="color: red;"><?php echo form_error("video"); ?></span>
								</div>
							</div>
							
							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-11 widget-right">
									<button type="submit" class="btn btn-default btn-md pull-right">Submit</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			
		</div><!--/.col-->
		
	</div><!--/.row-->
</div>	<!--/.main-->
	  