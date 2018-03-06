<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php the_title();?></title>
    <link href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= get_template_directory_uri(); ?>/assets/css/font-awesome.css" rel="stylesheet"> 
	<link href="<?php echo get_template_directory_uri();?>/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="main-division">
        <section class="block10">
            <div class="container">
                <div class="row">
                <div class="col-sm-9">
                    <ul class="contact-detail">
                        <li><a href="tel:<?= get_option('twentyseventeen_first_phone_number'); ?>"><i class="fa fa-phone mgn-rgt-contant"></i> +95-<?= get_option('twentyseventeen_first_phone_number'); ?></a></li>
                        <li><a href="mailto:<?= get_option('twentyseventeen_email_address'); ?>"><i class="fa fa-envelope mgn-rgt-contant"></i> <?= get_option('twentyseventeen_email_address'); ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="social-icon">
                        <li><a href="<?= get_option('twentyseventeen_twitter_link'); ?>"><i class="fa fa-twitter circle"></i></a></li>
                        <li><a href="<?= get_option('twentyseventeen_facebook_link'); ?>"><i class="fa fa-facebook circle"></i></a></li>                        
                        <li><a href="<?= get_option('twentyseventeen_instagram_link'); ?>"><i class="fa fa-instagram circle"></i></a></li>
                    </ul>
                </div>
            </div>
            </div>
        </section>
        <section class="block1 second-top">
            <div class="container">
                <div class="row">
                <div class="col-sm-12">
                    <div class="header-right">
                            <div class="navbar-header">
                                <a class="navbar-brand hidden-lg hidden-md visible-sm visible-xs" href="<?php the_permalink(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/logo.png"></a>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                            <?php wp_nav_menu( array(
                                                    'menu'              => 'primary',
                                                    'theme_location'    => 'primary',
                                                    'menu_class'        => 'nav navbar-nav',
                                                    'menu_id'           => 'main-nav',
                                                    'walker'            => new wp_bootstrap_navwalker()));?>
                            </div>
                    </div>
                </div>
                    </div>
            </div>
        </section>
<?php  if(is_page(4)){  ?>
        <section class="block2">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                   <?php $sql = get_post_meta(81, '_cycloneslider_metas' , true ); ?>
                      <?php $all = count($sql); ?>
                <ol class="carousel-indicators hidden-xs">
                 <?php  for($i=0; $i<$all; $i++){ ?>
         <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo 'active'; } ?>"></li>
                          <?php } ?>
                    </ol>
                      <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      
                           <?php $count = 0; ?> 
                            <?php foreach( $sql as $query){ ?> 
                                      <?php $result = get_post( $sql[$count]['id'] );  ?>
                                      <?php $path = $result->guid; ?>
                    <div class="item <?php if($count == 0){ echo 'active'; } ?> <?php if($count == 1){ echo ''; } ?>">
                        <img src="<?php  echo $path; ?>" alt="" width="100%">
                        <div class="carousel-caption">
                          <h2><?php echo $query['title'];?></h2>
                          <p class="banner-content"><?php echo $query['description'];?></p>
                          <div class="banner-btn"><a class="more-info" href="<?=get_the_permalink(47); ?>">Contact Us</a></div>
                        </div>
                      </div>
                      <?php $count++;
                       } ?>
                      </div>
                    </div>
                    

                    <!-- Controls -->
                   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
            
          </section>
<?php } else if(is_singular('our_sevices') || is_singular('our_classes') || is_singular('store_product' ) || is_singular('retreat_s') || is_singular('post') || is_singular('workshop') ){ 
	echo " ";
 } else{ ?> <img src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%"><?php } ?>
