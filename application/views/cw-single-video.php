  <section id="single-page-section">
    	<div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                	<div class="single-video">
                		<div class="single-video-section">
	                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $cwvs->video; ?>" frameborder="0" allowfullscreen></iframe>
	                    </div>
                	</div>
                	<div class="comment-form">
                		<h5 class="title-bar"><span>Comment's About This video</span><em style="padding-left: 7px; padding-top: 7px;"><?php echo $this->session->flashdata("msg"); ?></em></h5>
                		<form action="<?php echo base_url(); ?>tv/comments/<?php echo $cwvs->video_id ?>" method="post" >
                            <!-- <input type="text" name="hidden" value="<?php //echo $cwvs->video_id ?>" > -->
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Name : </label>
								<div class="col-xs-10">
									<input class="form-control" value="<?php echo set_value("name"); ?>" type="text" name="name" id="example-text-input">
                                    <span style="color: red;"><?php echo form_error("name"); ?></span>			
                                </div>
							</div>
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Email : </label>
								<div class="col-xs-10">
									<input class="form-control" type="email" value="<?php echo set_value("email"); ?>" name="email" id="example-email-input">
                                    <span style="color: red;"><?php echo form_error("email"); ?></span>  
								</div>
							</div>
                			<div class="form-group row">
								<label for="example-text-input" class="col-xs-2 col-form-label">Comment : </label>
								<div class="col-xs-10">
									<textarea class="form-control" name="comment" rows="3"></textarea>
                                    <span style="color: red;"><?php echo form_error("comment"); ?></span>  
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
                    <div class="previews-comment">
                        <div class="row">
                            <?php $cmnt = $this->mt->getWhereLimit("comments", array("video_id"=>$cwvs->video_id), 4, "desc"); 
                               foreach ($cmnt as $v):
                                if($v->published_status==1 ){
                            ?>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <div class="pre-comments-area">
                                    <h4><?php echo $v->name; ?></h4>
                                    <em><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo  $this->mt->calculate_age($v->comments_date) . " ago ";  ?> </em>
                                    <p><?php echo $v->comment; ?> </p>
                                </div>
                            </div>
                        <?php } endforeach; ?>
                        </div>
                    </div>
                	<div class="related-video">
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> -->
                        		<h6 class="title-bar"><span>Related Videos</span></h6>
                        	<?php
                        		$relvideo = $this->db->get_where('video', array('cate_id' => $cwvs->cate_id), 4, "asc")->result();
                        		 foreach($relvideo as $v): 
                        			//if($cwvs->cate_id==$v->cate_id){ 
                        		?>
                        		<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        			<div class="category-video-img rl-video">
        	                            <img src="http://img.youtube.com/vi/<?php echo $v->video; ?>/0.jpg" alt="video" class="img-responsive">
        	                            <a href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><div class="hover-item"></div></a>
        	                        </div>
                        		</div>
                        	<?php   endforeach;?>
                        <!-- </div> -->
                	</div>

                </div>

                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                	<div class="single-popular">
                		<h6 class="widget-title">Popular Videos</h6>
                		<?php foreach($pvideo as $v): ?>
		                    <div class="popular-video">
		                        <div class="category-video-img">
		                            <img src="http://img.youtube.com/vi/<?php echo $v->video; ?>/0.jpg" alt="video" class="img-responsive">
		                            <a href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><div class="hover-item"></div></a>
		                        </div>
                                <h5 target="_blank" class="video-title"><a href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><?php echo $v->title; ?></a></h5>
		                    </div>
	                    <?php endforeach; ?>
                	</div>
                </div>
            </div>
        </div>
    </section>