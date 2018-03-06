<?php

/**
Template Name: Pricing
  */ 
 get_header();
if(isset($_GET['catID'])){
$catID = $_GET['catID'];
} else {
$catID =6;
}?>
 <div class="inner-pages">
<div class="container">
<div class="row pdg-bottom">
              <div class="col-xs-12 ">
                          <ul class="nav nav-tabs itinerary pricing">
                          <?php  
                               $args = array(
                                    'taxonomy' => 'pricing',
                                    'orderby' => 'id',
                                    'hide_empty'=> 0,
                                    
                                );
                          //$category_id = get_cat_ID('Uncategorized');
                          $categories = get_categories($args);
                          $count = 0;
                              foreach($categories as $category) { ?>
                                           
                      <li class="<?php if(isset($catID) && $catID == $category->term_id){ echo 'active'; } ?> <?php if($count == 1){ echo ''; } ?>">
                                      <a href="?catID=<?= $category->term_id; ?>"><?= $category->name;  ?></a></li>

                          <?php } $count++; $id++; ?>
                          </ul>
              </div>
       <div class=" col-xs-12">
            <div class="tab-content">
                <div id="p1" class="tab-pane fade in active day-scroll-prop">
                  <?php $sql =array(
                                    'post_type' => 'pricing_s',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                     array(
                                    'taxonomy' => 'pricing',
                                    'field'    => 'term_id',
                                    'terms'   => $catID,
                                    ),
                                  ),
                                ); 
                $result = new WP_Query($sql); if($result->have_posts()):?>
                <div class="row">
                    <?php while($result->have_posts()): $result->the_post(); ?>
                  <div class="col-sm-12 col-md-6">
                          <h2 class="indi_head"><?php the_title(); ?></h2>
                          <?php if(have_rows('select_category_&_membership_table')):?>
                    <ul class="pricing-data-table-left">
                          <li class="memb_heading">Membership Plans</li>

                            <?php while(have_rows('select_category_&_membership_table')):the_row();

                                    $priceCat = get_sub_field('pricing_category');

                                  if(isset($priceCat) && $priceCat == $catID){

                            if(have_rows('membership_table')):while(have_rows('membership_table')):the_row();?>

                          <li><?php the_sub_field('membership'); ?></li>
                    <?php endwhile;
                   endif;
                   }
                  endwhile;?>
                    </ul>
                    <ul class="pricing-data-table-right">
                      <li class="memb_heading">Payment</li>
                      <?php  while(have_rows('select_category_&_membership_table')):the_row();
                       $priceCat = get_sub_field('pricing_category');
                        if(isset($priceCat) && $priceCat == $catID){
                          if(have_rows('membership_table')):while(have_rows('membership_table')):the_row();?>
                      <li><?php the_sub_field('price');?></li>
                      <?php endwhile; endif; 
                    }  endwhile;?>
                    </ul>
                   <?php endif;?>
                </div>
             <?php endwhile; ?>
                     <?php wp_reset_query();?>  
               </div>
             <?php endif;?>
      </div>
                 
          </div>
</div>
</div>
</div>
</div>
</div>
 <?php get_footer(); ?>       