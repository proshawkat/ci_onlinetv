    <section id="category-section">
    	<div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                	<div id="category-video">
                        <?php 
                            //$id = $this->mt->singleData("category", array("cate_name"=>$cate_name));
                            //echo $id->cate_id;
                        	if(count($result)){
                            foreach($result as $cv): 
                		?>
                		<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                			<div class="category-video-img rl-video">
	                            <img src="http://img.youtube.com/vi/<?php echo $cv->video; ?>/0.jpg" alt="video" class="img-responsive">
	                            <a target="_blank" href="<?php echo base_url(); ?>tv/cwvs/<?php echo $cv->video_id; ?>"><div class="hover-item"></div></a>
	                        </div>
	                        <h5 class="video-title"><a target="_blank" href="<?php echo base_url(); ?>tv/cwvs/<?php echo $cv->video_id; ?>"><?php echo $cv->title; ?></a></h4>
                		</div>
                	<?php endforeach; }else{ ?>
                		<div><p style="color:#999; text-align:center; padding-top:25px; font-size: 25px;">Result not found!!</p></div>
                		<?php } ?>
                	</div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                	<div class="single-popular">
                		<h6 class="widget-title">Popular Videos</h6>
                		<?php foreach($pvideo as $v): ?>
		                    <div class="popular-video">
		                        <div class="category-video-img">
		                            <img src="http://img.youtube.com/vi/<?php echo $v->video; ?>/0.jpg" alt="video" class="img-responsive">
		                            <a target="_blank" href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><div class="hover-item"></div></a>
		                        </div>
		                        <h5 target="_blank" class="video-title"><a href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><?php echo $v->title; ?></a></h5>
		                    </div>
		                <?php endforeach; ?>
                	</div>
                </div>
            </div>
        </div>
    </section>