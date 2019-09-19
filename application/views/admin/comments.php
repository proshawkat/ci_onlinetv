<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Manage Comments</li>
				<li><?php $msg = $this->session->flashdata("msg"); echo "<em style='color:red;'>".$msg."</em>"?></li>
			</ol>
		</div><!--/.row-->
		
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Comments</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-field="state" data-checkbox="false" >No.</th>
							        <th data-field="id" data-sortable="true">Name</th>
							        <th data-field="email" data-sortable="true">Email</th>
							        <th data-field="comment" data-sortable="true">Comments</th>
							        <th data-field="video" data-sortable="true">Video</th>
							        <th data-field="action" data-sortable="true">Action</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $i=1; foreach($comments as $v): ?>
						    	<tr>
						    		<td><?php echo $i++; ?></td>
						    		<td><?php echo $v->name; ?></td>
						    		<td><?php echo $v->email; ?></td>
						    		<td><?php echo $v->comment; ?></td>
						    		<td><?php $video = $this->mt->singleData("video", array("video_id"=>$v->video_id)); ?>
						    			<iframe width="100%" height="150" src="https://www.youtube.com/embed/<?php echo $video->video; ?>" frameborder="0" allowfullscreen></iframe>
						    		</td>
						    		<td>
						    			<ul class="list-inline">
						    				<li>
						    					<?php if($v->published_status == 0){ ?>
								    			<form id="form1" name="form1" method="post" action="<?php echo base_url(); ?>dashboard/published">
								    				<input name="pbstatus" id="views" value="1" type="hidden" hidden=""> 
								    				<input name="comment_id" type="hidden" value="<?php echo $v->comment_id; ?>" >
								    				<input class="btn btn-info" data-inline="true" id="submit" value="Publish" type="submit">
								    			</form>
								    			<?php }else{ ?>
								    				<button type="button" class="btn btn-warning" disabled="disabled">Published</button>
								    			<?php } ?>
						    				</li>
						    				<li><a class="btn btn-danger" href="<?php echo base_url(); ?>dashboard/delete_comment/<?php echo $v->comment_id; ?>">Delete</a></li>
						    			</ul>
						    			
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