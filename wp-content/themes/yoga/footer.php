<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<section class="block16">
  	<div class="container">
    	<div class="row">
        	<div class="col-sm-4 col-md-4">
            	<h4><span><i class="fa  fa-slack footer-circle"></i></span>About us</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer </p>
				<ul class="footer-left-social-icon">
				<h6>Social media:- </h6>
					<li><a href="<?= get_option('twentyseventeen_twitter_link'); ?>"><i class="fa fa-twitter footer-circle"></i></a></li>
					<li><a href="<?= get_option('twentyseventeen_facebook_link'); ?>"><i class="fa fa-facebook footer-circle"></i></a></li>
					<li><a href="<?= get_option('twentyseventeen_instagram_link'); ?>"><i class="fa fa-instagram footer-circle"></i></a></li>
				</ul>
            </div>
            <div class="col-md-2 col-md-offset-1 col-sm-4">
            	
            	<h4><span><i class="fa fa-handshake-o footer-circle"></i></span>links</h4>
                <?php wp_nav_menu( array(
                                            'menu'              => 'footer_menu',
                                            'theme_location'    => 'footer_menu',
                                            'menu_class'        => 'footer-nav',
                                            'walker'            => new wp_bootstrap_navwalker()));?> 
            
            </div>
            
            <div class="col-md-4 col-md-offset-1 col-sm-4">
            	
            	<h4><span><i class="fa   fa-link footer-circle"></i></span>Contact</h4>
                
                <p class="footer-address"><?= get_option('twentyseventeen_address'); ?></p>            
                <p class="phone-footer"><a href="tel:<?= get_option('twentyseventeen_first_phone_number'); ?>">+95-<?= get_option('twentyseventeen_first_phone_number'); ?><br>+95- <?= get_option('twentyseventeen_second_phone_number'); ?></a></p>
                <p class="email-footer"><a href="mailto:<?= get_option('twentyseventeen_email_address'); ?>"><?= get_option('twentyseventeen_email_address'); ?></a></p>
            </div>
        </div>
    </div>
  </section>
		
        
        <section class="block9">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-12">
                    	<a href="#" class="date-icon">Copyrights ©<?php echo get_the_date('Y'); ?>  - All Rights Reserved | Crafted by <a rel="nofollow" target="_blank" href="https://greenwebmedia.com" style="text-decoration:none;color:#fff">Greenwebmedia.com</a></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/owl.carousel.js"></script> 
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/custom.js"></script> 

	
	<script >
			$('.owl-carousel').owlCarousel({
			autoplay:true,
    loop:true,
	margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
	
	</script>
	     <script>
         $(document).ready(function(){
        var imgpath = $(".imgg1 .attachment-post-thumbnail").attr('src');
            $("#myImg").attr('src',imgpath);
        
        $(".img_parent").click(function(){
            var imgpath = $(this).parent('.panel-title').parent('.panel-heading').parent('.panel').children('.img_child').children('img').attr('src');
            $("#myImg").fadeOut(function(){
console.log(imgpath);
                $("#myImg").attr("src", imgpath);
                $("#myImg").fadeIn();
                });
            
            });
            
        });
             
             $(document).ready(function() {
    var stickyNavTop = $('.second-top').offset().top;
    var stickyNav = function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > stickyNavTop) {
            $('.second-top').addClass('sticky')
        } else {
            $('.second-top').removeClass('sticky')
        }
    };
    stickyNav();
    $(window).scroll(function() {
        stickyNav()
    })
});
  	/*$(document).ready(function(){
			$("#myImgbtnone1").click(function(){
			$("#myImg").fadeOut(function(){
				$("#myImg").attr("src", "<//?ph echo get_bloginfo('template_directory'); ?>/assets/images/class-girl.png");
				$("#myImg").fadeIn();
				});
			
			});
			$("#myImgbtnone2").click(function(){
			$("#myImg").fadeOut(function(){
				$("#myImg").attr("src", "assets/images/class-girl.png");
				$("#myImg").fadeIn();
				});
			
			});
			$("#myImgbtnone3").click(function(){
			$("#myImg").fadeOut(function(){
				$("#myImg").attr("src", "assets/images/class-girl.png");
				$("#myImg").fadeIn();
				});
			
			});



		});
             
             $(document).ready(function() {
    var stickyNavTop = $('.second-top').offset().top;
    var stickyNav = function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > stickyNavTop) {
            $('.second-top').addClass('sticky')
        } else {
            $('.second-top').removeClass('sticky')
        }
    };
    stickyNav();
    $(window).scroll(function() {
        stickyNav()
    })
});*/



  </script>
  <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script> 
<?php wp_footer(); ?>

</body>
</html>
