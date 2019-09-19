    <section id="main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="tv-area">
                        <div class="video-section">
                            <iframe width="100%" height="200" src="https://www.youtube.com/embed/aVQLJ-NBIWE?autoplay=1" frameborder="0" allowfullscreen autopale></iframe>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>


    <section id="category-video-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                    <h6 class="title-bar"><span>Category Videos</span> <a href="" title="View All"><i class="fa fa-angle-right"></i></a></h6>
                    <?php foreach($category as $vc):
                        $video = $this->mt->singleData("video", array("cate_id"=>$vc->cate_id));
                        //echo $video->cate_id;
                     ?>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="category-wise-video">
                                <div class="category-video-img">
                                    <?php if($video->cate_id != null){ ?>
                                        <img src="http://img.youtube.com/vi/<?php echo $video->video; ?>/0.jpg" alt="video" class="img-responsive"><a  href="<?php echo base_url(); ?>tv/cat/<?php echo $vc->cate_id; ?>"><div class="hover-item"></div></a>
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>assets/images/null_video.jpg" alt="video" class="img-responsive"><a  href="<?php echo base_url(); ?>tv/cat/<?php echo $vc->cate_name; ?>"><div class="hover-item"></div></a>
                                    <?php } ?>
                                </div>
                                <h4 class="category-name"><a href="<?php echo base_url(); ?>tv/cat/<?php echo $vc->cate_name; ?>"><?php echo $vc->cate_name; ?></a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                    <h6 class="widget-title">Popular Videos</h6>
                    <?php foreach($pvideo as $v): ?>
                        <div class="popular-video">
                            <div class="category-video-img">
                                <img src="http://img.youtube.com/vi/<?php echo $v->video; ?>/0.jpg" alt="video" class="img-responsive">
                                <a target="_blank" href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><div class="hover-item"></div></a>
                            </div>
                            <h5 class="video-title"><a href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><?php echo $v->title; ?></a></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>