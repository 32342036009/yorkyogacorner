<?php 
/**
Template Name: Contact

**/
get_header();
 ?>

<div class="container">
<div class="row">
<div class="col-sm-12">
<h2 class="innerpage-heading text-center">KEEP IN TOUCH</h2>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<ul class="contact-box">
    <li>
        <div class="social-icon"><i class="fa fa-phone"></i></div>
        <h4><strong>PHONE</strong></h4>
        <p><a href="tel:+95-9969113841">Phone : +<?= get_option('twentyseventeen_first_phone_number'); ?></a></p>
        <p><a href="tel:+95- 9254231742" >Phone : +95- <?= get_option('twentyseventeen_second_phone_number'); ?></a></p>
    </li>
    <li>
            <div class="social-icon"><i class="fa fa-map-marker"></i></div>
            <h4><strong>ADDRESS</strong></h4>
            <?= get_option('twentyseventeen_address'); ?>
    </li>
    <li>
            <div class="social-icon"><i class="fa  fa-envelope"></i></div>
            <h4><strong>EMAIL</strong></h4>
            <p><a href="mailto:info@yorkyogacorner.com">Email : <?= get_option('twentyseventeen_email_address'); ?></a></p>
    </li>
</ul>
</div>
</div>
<div class="row pdg-bottom">
<div class="col-sm-6">
	<?php dynamic_sidebar('map'); ?>
</div>
<div class="col-sm-6">
		<div class="row">
		<div class="login-form clearfix contactus">
		<?= do_shortcode('[contact-form-7 id="152" title="Contact Us"]'); ?>                                                                       
		</div>
		</div>
</div>
</div>
</div>


<?php get_footer(); ?>  