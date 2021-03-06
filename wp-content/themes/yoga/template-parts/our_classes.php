<?php

/**
Template Name: Classes
  */ 
 get_header(); ?>

<div class="inner-pages">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h2 class="innerpage-heading">Classes</h2>
</div>
</div>
<div class="row">
<?php 
      $sql = array('post_type' => 'our_classes',
                    'post_status'=>'publish',
                    'posts_per_page'=>-1,); ?>
      <?php $result = new WP_Query($sql); ?>
      <?php while($result->have_posts()):$result->the_post(); ?>              
  <div class="col-sm-4">
            <div class="classess-section">
                <div class="classess-section-images"><?php the_post_thumbnail(); ?></div>
                  <div class="classess-section-text">
                    <h4><?php the_title(); ?></h4>
                    <div class="class_description_text"><?php echo wp_trim_words( get_the_excerpt(), 18, '..' ); ?></div>
                  </div>
                <div class="class-btn"><a href="<?php the_permalink(); ?>">Read More</a></div>
            </div>
    </div>
<?php endwhile;
wp_reset_query();
 ?>
      </div>
  </div>
  </div>
 <?php get_footer(); ?>       