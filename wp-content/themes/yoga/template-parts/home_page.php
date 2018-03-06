<?php

/**
Template Name: Home
  */ 
 get_header(); ?>

  <section class="block3">
        	<div class="container">
            	<div class="row row-border">
                <div class="col-sm-5">
					<div class="about-girl">
                   
						<img src="<?php echo get_field('image'); ?>">
					</div>
				</div>
				<div class="col-sm-7">
					<h2 class="welcome-heading"><?php echo get_field('title',4); ?></h2>
					<p><?php echo get_field('description',4); ?></p>
					<div class="about-us-read-more">
						<a href="<?php echo get_the_permalink(45); ?>">Read more</a>
					</div>
				</div>
                </div>
             </div>
			 <div class="container">
				<div class="row">
                <div class="col-sm-12">
					<h2 class="service-main-heading">Our Classes</h2>
				</div>
			
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="class-girl bs-example ">
                      <img src="" id="myImg">
                    </div>
                  </div>
                
                    <div class="col-sm-6">
                      <div class="bs-example">
              <div class="panel-group" id="accordion">
              <?php $arg = array('post_type' =>'our_classes',
                                'posts_per_page' =>-1);
                                $mypost  =  new WP_Query($arg);
                                $i =1;
                            while($mypost->have_posts()):$mypost->the_post();?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title ">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class="collapsed img_parent" aria-expanded="false" id="myImgbtnone<?php echo $i; ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <div class="imgg<?php echo $i;?> img_child" style="display:none"><?php echo get_the_post_thumbnail(); ?></div>
                    <div id="collapse<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1){ echo 'in';}?>" aria-expanded="false" >
                        <div class="panel-body">
                            <p> <?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>"><strong>Read More</strong></a></p>
                        </div>
                    </div>
                </div>
               
                
               
                <?php 
                $i++;
                endwhile;
                wp_reset_query();?>
              </div>

              </div>
                    </div>
                  
                  
                </div>
               </div>
        </section>
        <section class="block4">
    	<div class="container">
        	<div class="row">
            	<h2>The Main Reasons to Practice Yoga</h2>
            	<div class="col-sm-4">
                	<div class="block4-left-outer">
                    	<div class="block4-left">
                      <?php  ?>

                    	<div class="residential">
                        	<p class="res-heading"><?= get_field('harmonize_the_body_title'); ?></p>
                              <p><?= get_field('harmonize_the_body_description'); ?></p>
                        </div>
                        <div class="commercial">
                        	<i class="fa  fa-heart-o service-circle"></i>
                        </div>
                    </div>
                    	<div class="block4-left">
                    	<div class="residential">
                        	<p class="res-heading"><?= get_field('yoga_for_everybody_title'); ?></p>
                            <p><?= get_field('yoga_for_everybody_description'); ?></p>
                        </div>
                        <div class="commercial">
                        	<i class="fa  fa-users service-circle"></i>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
					<img src="<?= get_field('the_main_resion_to_practice_yoga_image'); ?>" class="img-responsive">
                	
                </div>
                <div class="col-sm-4">
                	<div class="block4-left-outer">
                        <div class="block4-right">
                            
                            <div class="residential">
                                <i class="fa fa-eye service-circle"></i>
                            </div>
                            <div class=" commercial">
                                <p class="res-heading"><?= get_field('meditation_practice') ?></p>
                                <p><?= get_field('meditation_practice_description'); ?></p>
                            </div>
                        </div>
                        <div class="block6-right">
                        	<div class=" residential">
                                <i class="fa fa-rocket service-circle"></i>
                            </div>
                            <div class="commercial">
                                <p class="res-heading"><?= get_field('yoga_for_real_energy_title'); ?></p>
                                <p><?= get_field('yoga_for_real_energy_descrioption') ?></p>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
        </div>
    </section>
        <section class="block11">
      <div class="container">
      <div class="row">
          <div class="col-sm-12"><h2>Our Services</h2></div>
      </div>
      
      
      <div class="row">
        <?php $sql = array('post_type'=> 'our_sevices   ',
                            'post_status'=>'publish',
                            'posts_per_page'=>3);   ?>
           <?php $result = new WP_Query($sql); ?>
           <?php while($result->have_posts()): $result->the_post(); ?>
        <div class="col-sm-4 main-service">
  <div class="service-girl">
    <?= get_the_post_thumbnail(); ?>
  </div>
  <h4><?php echo get_the_title();?></h4>
            <p><?php echo wp_trim_words( get_the_excerpt(), 20, '..' ); ?></p>
  <div class="service-girl-btn">
    <a href="<?php the_permalink();?>">Read more <i class="fa  fa-angle-double-right"></i></a>
  </div>
</div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
        </div>
      </div>
    </section>
		
		<section class="block6">
        	<div class="container">
            	
            	<div class="row">
                	<div class="col-md-5 col-sm-6">
                    	<!--<div class="fix-app-<?//=get_template_directory_uri(); ?>/assets/images" ><img src="<?=get_template_directory_uri(); ?>/assets/images/fix-appointment.png"></div>-->
                    </div>
                    <div class="col-md-7 col-sm-6">

                    	<?php echo do_shortcode('[contact-form-7 id="141" title="Home Contact"]'); ?>

                    </div>
                </div>
            </div>
        </section>
        <section class="block7">
          <div class="container">
              <div class="row">
                      <div class="col-sm-12">
                          <h2>our Blog</h2>
                        </div>
                    </div>
              <div class="row">
                <?php $args=array(
                          'post_type' => 'post',
                          'post_status' => 'publish',
                          'posts_per_page' => 3
                          );
                            $my_query = new WP_Query($args);
                          while ($my_query->have_posts()) : $my_query->the_post(); ?> 
                  <div class="col-sm-4">
                      <div class="blog-section">
                          <div class="blog-image">
                              <?=get_the_post_thumbnail(); ?>
                                <div class="blog-date">
                                  <p class="date-icon"><i class="fa  fa-clock-o mg-right"></i>  <span class="mg-right"><?php echo get_the_date(); ?></span>    <i class="fa fa-user mg-right"></i>  By <?php echo get_current_user();?></p>
                                 </div>
                            </div>
                            <div class="blog-text">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo wp_trim_words( get_the_content(), 12, '..' ); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="blog-ream-more">Read More</a>
                            </div>
                        </div>
                    </div>
                  <?php endwhile; 
                  wp_reset_query();
                   ?>

                </div>
            </div>
        </section>
		<section class="block15">
    <div class="container">
      <div class="row">
          <div class="col-sm-12">
                <h2><span>Testimonials</span></h2>
            </div>
            
            
        </div>
        <div class="row">
                <div class="col-sm-12">
                <div class="block15-width">
                    <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
<?php $args=array(
                        'post_type' => 'testimonials',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                        );
                      $my_query = new WP_Query($args);
                      $noOfTests = $my_query->post_count;
                      $counter = 0; ?>
                      <!-- Carousel indicators -->
                      <ol class="carousel-indicators">
  <?php for($i=0;$i<$noOfTests;$i++) {?>
                        <li data-target="#fade-quote-carousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo "active"; } ?>"></li>
                          <?php } ?>
                      </ol>
                      <!-- Carousel items -->
                      <div class="carousel-inner">
                       
                      <div class="carousel-inner">
                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="item <?php if($counter==0){ echo 'active'; } else{} ?>">
                            <blockquote>
                              <?php the_content(); ?><i class="fa fa-quote"></i>
                                <div><?= get_the_post_thumbnail(); ?></div>
                            </blockquote> 
                        </div>
                         <?php $counter++;
                          endwhile; 
                          wp_reset_query();?>
                      </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  </section
		<section class="block8">
        	<?php dynamic_sidebar('map'); ?>
            
        </section>
 <?php get_footer(); ?>       