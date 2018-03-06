<?php

/**
Template Name: Workshop
  */ 
 get_header(); ?>
 <div class="inner-pages">
        <div class="container">
           <div class="row">
           <h2 class="innerpage-heading"><?php the_title(); ?></h2>
            <div class="col-sm-12 past_workshop">Upcoming workshops</div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div  class="owl-carousel owl-theme workshop-slider">

            <?php $sql = array('post_type' =>'workshop' ,
                               'post_status'=>'publish',
                               'posts_per_page'=>-1,); ?>
            <?php $result= new WP_Query($sql); ?>
            <?php while($result->have_posts()):$result->the_post();
              $currentDate = date("Y/m/d");
              $eventDate = get_field('date');
              if($currentDate<=$eventDate)
              {
            ?>

           <div class="item ">
                <div class="item-inner">
              <div class="classess-section">
                <div class="classess-section-images">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="classess-section-text">
                  <h4><?php the_title(); ?></h4>
                  <p><?php echo wp_trim_words(get_the_content(), 25, '..' ); ?></p>
                  <ul class="workshop">
                    <li><i class="fa fa-calendar mgn-right-icon"></i><span><?php echo $eventDate;  ?></span></li>
                  </ul>
                  
                </div>
                <div class="class-btn"><a href="<?php  the_field('facebook_posted_link');  ?>">Read More</a></div>
              </div>
            </div>
            </div>
             
            <?php } endwhile;
            wp_reset_query();
             ?>
           </div>
           </div>
          
        </div>
        <div class="container">
           <div class="row">
            <div class="col-sm-12 past_workshop">Past workshops</div>
            </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
            <div  class="owl-carousel owl-theme workshop-slider">
            <?php $result= new WP_Query($sql); ?>
            <?php while($result->have_posts()):$result->the_post(); 
              $currentDate = date("Y/m/d");
              $eventDate = get_field('date');
              if($currentDate>$eventDate)
              {
            ?>

            <div class="item ">
                <div class="item-inner">
              <div class="classess-section">
                <div class="classess-section-images">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="classess-section-text">
                  <h4><?php the_title(); ?></h4>
                  <p><?php echo wp_trim_words(get_the_content(), 25, ' ...' ); ?></p>
                  <ul class="workshop">
                    <li><i class="fa fa-calendar mgn-right-icon"></i><span><?php echo $eventDate; ?></span></li>
                  </ul>
                  
                </div>
                <div class="class-btn"><a href="<?php echo the_field('facebook_posted_link'); ?>">Read More</a></div>
              </div>
            </div>
            </div>
             
            <?php }
 endwhile;
            wp_reset_query();
             ?>
           </div>
          
        </div>
      </div>
 <?php get_footer(); ?>       