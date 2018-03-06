<?php

/**
Template Name: Store
  */ 
 get_header(); ?>

<div class="inner-pages">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h2 class="innerpage-heading">Store</h2>
</div>
</div>
<div class="div">
  <?php echo get_field('page_discription'); ?>
</div>

<div class="row pdg-bottom">
<?php 
      $sql = array('post_type' => 'store_product',
                    'post_status'=>'publish',
                    'posts_per_page'=>-1,); ?>
      <?php $result = new WP_Query($sql); ?>
      <?php while($result->have_posts()):$result->the_post(); ?>              
  <div class="col-sm-3">
            <div class="classess-section">
            <h4><?php the_title(); ?></h4>
                <div class="classess-section-images"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                  
                  <?php // the_content(); ?>
                  
            </div>
    </div>
<?php endwhile;
wp_reset_query();
 ?>
      </div>
  </div>
  </div>
 <?php get_footer(); ?>       