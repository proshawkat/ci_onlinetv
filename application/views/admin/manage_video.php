<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Manage Video</li>
				<li><?php $msg = $this->session->flashdata("msg"); echo "<em style='color:red;'>".$msg."</em>"?></li>
			</ol>
		</div><!--/.row-->
		
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Video List</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-field="state" data-checkbox="false" >No.</th>
							        <th data-field="id" data-sortable="true">Category Name</th>
							        <th data-field="title" data-sortable="true">Title</th>
							        <th data-field="video" data-sortable="true">Video</th>
							        <th data-field="action" data-sortable="true">Action</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $i=1; foreach($video as $v): ?>
						    	<tr>
						    		<td><?php echo $i++; ?></td>
						    		<td><?php $c = $this->db->get_where("category", array("cate_id"=>$v->cate_id))->row(); echo $c->cate_name; ?></td>
						    		<td><?php echo $v->title; ?></td>
						    		<td> <iframe width="100%" height="150" src="https://www.youtube.com/embed/<?php echo $v->video; ?>" frameborder="0" allowfullscreen></iframe></td>
						    		<td><a class="btn btn-info" href="<?php echo base_url(); ?>dashboard/edit_video/<?php echo $v->video_id; ?>">Edit</a> <a class="btn btn-danger" href="<?php echo base_url(); ?>dashboard/delete_video/<?php echo $v->video_id; ?>">Delete</a>
						    			<?php if($v->popular == 1): ?>
						    				<button type="button" class="btn btn-warning" disabled="disabled">Populared</button>
						    			<?php endif; ?>
						    		</td>
						    	</tr>
						    <?php endforeach; ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->