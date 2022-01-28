
        <section class="page-banner page-breadcrumb ">
            <div class="image-layer"></div>
            <div class="auto-container">
          
                <h1>News</h1>
            </div>
        </section>
        <?php
        if(!empty($news_data))
        { 
        ?>
        <div data-elementor-type="wp-page" data-elementor-id="655" class="elementor elementor-655" data-elementor-settings="[]">
            <div class="elementor-inner">
                <div class="elementor-section-wrap">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-3bab38e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3bab38e" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7d7892f" data-id="7d7892f" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-b2bb97e elementor-widget elementor-widget-blog_area__o" data-id="b2bb97e" data-element_type="widget" data-widget_type="blog_area__o.default">
                                                <div class="elementor-widget-container">
                                                    <section class="news-section">
                                                        <div class="auto-container">
                                                            <div class="row clearfix">
                                                                <?php
                                                                foreach($news_data as $row)
                                                                { 
                                                                ?>
                                                                <div class=" news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                                                    <div class="inner-box">
                                                                        <div class="image-box">
                                                                            <figure class="image">
                                                                                <!-- <a href="../avoid-solar-panels-damage-your-top-roof-copy-3-copy/index.html"> -->
                                                                                    <div class="post-thumbnail">
                                                                                        <img width="773" height="451" src="<?php echo base_url('assets/img/news/'.$row->image_address) ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" style="height: 250px;" sizes="(max-width: 773px) 100vw, 773px" />
                                                                                    </div>
                                                                                <!-- </a> -->
                                                                            </figure>
                                                                            <div class="post-date">
                                                                                <span class="day"><?php echo  date('d',strtotime($row->created_at)) ?></span><span class="month"><?php echo  substr(date('F',strtotime($row->created_at)),0,3) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="lower-box">
                                                                            <h3><?php echo $row->news_title ?></h3>
                                                                            <div class="meta-info"><?php echo $row->news_desc ?></div>
                                                                            <!-- <div class="link-box">
                                                                                <a href="../avoid-solar-panels-damage-your-top-roof-copy-3-copy/index.html"><span class="txt">Read More</span> <span class="icon flaticon-arrows-11"></span></a>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                              
                                                              
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php
        } 
        ?>