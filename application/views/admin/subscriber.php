<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Manage subscriber</li>
				<li><?php $msg = $this->session->flashdata("msg"); echo "<em style='color:red;'>".$msg."</em>"?></li>
			</ol>
		</div><!--/.row-->
		
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Subscriber List</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-field="state" data-checkbox="false" >No.</th>
							        <th data-field="id" data-sortable="true">Name</th>
							        <th data-field="action" data-sortable="true">Action</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $i=1; foreach($subscriber as $v): ?>
						    	<tr>
						    		<td><?php echo $i++; ?></td>
						    		<td><?php echo $v->email; ?></td>
						    		<td><a class="btn btn-danger" href="<?php echo base_url(); ?>dashboard/delete_subscriber/<?php echo $v->subscriber_id; ?>">Delete</a></td>
						    	</tr>
						    <?php endforeach; ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->