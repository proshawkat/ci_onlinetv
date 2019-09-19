<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?php echo $user->user_name; ?></li>
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
			<div class="col-lg-3">
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-body my-panel">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc" >
						    <tbody>
						    	<tr>
						    		<td>Name : </td>
						    		<td><?php echo $user->user_name; ?>  </td>
						    	</tr>
						    	<tr>
						    		<td>Email : </td>
						    		<td><?php echo $user->email; ?></td>
						    	</tr>
						    	<tr>
						    		<td>Password : </td>
						    		<td><?php echo $user->password; ?><a  href="<?php echo base_url(); ?>settings/change_pass"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
						    	</tr>
						    	<tr>
						    		<td>User type : </td>
						    		<td><?php if($user->type == "sa"){ echo "Super Admin";} ?></td>
						    	</tr>

						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
</div><!--/.main-->