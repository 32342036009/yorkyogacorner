<?php
/**
 Template Name: About Us
 */

get_header(); ?>
<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h2 class="innerpage-heading"><?php the_title();?></h2>
</div>
</div>
</div>
<div class="container">
<div class="row pdg-bottom">
	<?php
		if(have_posts())
		{
			the_post();
			the_content();
		}

	?>
<div class="row">
<div class="col-sm-12">
<h2 class="about-us-headning">Our Trainers</h2>
</div>
<?php
	$loop= new WP_Query(array('post_type'=>'our_trainers', 'post_status'=>'publish'));
	while($loop->have_posts())
	{
		$loop->the_post();
?>
<div class="row">
<div class="col-sm-12">
<div class="item">
<div class="item-inner">
<div class="col-md-7 col-sm-12">
<div class="meet-team-images"><img src="<?php the_post_thumbnail_url();?>" /></div>
<div class="meet-team-desc">
<h2><?php the_field('trainer_name');?></h2>
<strong><?php the_title(); ?></strong>
<p class="text-justify about-text"><?php the_content(); ?></p>

</div>
<div class="clearfix"></div>
</div>
<div class="col-md-5 col-sm-9">
<div class="about-team-desc-table">
<table class="table table-striped table-responsive">
<tbody>
<tr>
<th scope="row">1</th>
<td>Phone:</td>
<td><a href="tel:+95-9969113841"><?php the_field('phone_number'); ?></a></td>
</tr>
<tr>
<th scope="row">2</th>
<td>E-mail:</td>
<td><a href="mailto:<?php the_field('email_id'); ?>"><?php the_field('email_id');?></a></td>
</tr>
</tbody>
</table>
</div>
<ul class="about-social-icon">
<h5>Socials</h5>
<li><a href="<?php the_field('facebook_link'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="<?php the_field('twitter_link'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a href="<?php the_field('google_+_link'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>

    </main>
  </div>
</div>

<?php get_footer();