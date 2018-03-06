<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();?>
<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
<div class="container">
<div class="row">
        <div class="col-sm-12 main-service">
          <h4 style="text-align:left;"><?php the_title(); ?></h4>
</div>
 

<div class="col-sm-8">
 <div class="service-girl-text"><?php the_content(); ?></div>
       </div> 
<div class="col-sm-4">
          <div class="service-girl-image">
<?php echo the_post_thumbnail(); ?>
</div> 
            </div>
</div>    
        </div>  
      <?php endwhile; ?>
    </main>
  </div>
</div>
<?php get_footer();