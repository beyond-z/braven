<?php
/**
 * Template Name: Staff/Borad Members Template
 */

get_header(); ?>


 <?php if ( has_post_thumbnail() ) : ?>
<div class="featured-header">
<div id="featimg"><?php the_post_thumbnail('featured-page-thumb'); ?></div>
<div id="sub-overlay"><h1><?php the_title();?></h1></div>
			</div>
 	<?php else : ?>    
    
    <div class="featured-header-wo">
<div id="sub-overlay"><h1><?php the_title();?></h1></div>
			
            </div>       
            
            <?php endif; ?>
            
            	<div id="primary" class="content-area">
             <div id="breadcrumb_wrapper">
<div style="margin:0 auto; max-width:65rem;">
 <?php the_breadcrumb(); ?> </div>
 </div>   
 
		<div id="content" class="site-content" role="main">
        
        	<div class="full-width">
        
        <?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		
				

				
            
						<?php the_content(); ?>
						
				

				
	
			
			<?php endwhile; ?>
            
         
<?php wp_reset_query(); ?>

        	</div><!-- .entry-content -->
        

		<div class="staff">

<h2 style="text-align:center;">BRAVEN STAFF</h2>
<?php 
function mam_posts_orderby ($orderby) {
   global $mam_global_orderby;
   if ($mam_global_orderby) $orderby = $mam_global_orderby;
   return $orderby;
}
add_filter('posts_orderby','mam_posts_orderby');
$mam_global_orderby = "
UPPER(CONCAT(REVERSE(SUBSTRING_INDEX(REVERSE($wpdb->posts.post_title),' ',1)),$wpdb->posts.post_title))
";
$count = 1;
$staffargs = array( 'post_type' => 'staff', 
'staff_categories' => 'staff-member',
 'order'          => 'ASC', 
 'posts_per_page' => -1 );
$staff_query = new WP_Query( $staffargs ); 
$mam_global_orderby = ''; 
?>
<?php if ( $staff_query->have_posts() ) : ?>
<?php while ( $staff_query->have_posts() ) : $staff_query->the_post();
$staffdata = get_post_meta( $staff_query->post->ID, 'staff', true ); ?>


<div class="fstaff one_quarter">

<div class="pic pic-3d">

<a href="<?php echo $staffdata[ 'plink' ]; ?>" target="_blank">

<?php if ( has_post_thumbnail() ) {
the_post_thumbnail('staff-thumb');
} else { ?>
<img src="https://bebraven.org/wp-content/uploads/2015/08/braven_profile.jpg" alt="<?php the_title(); ?>" />
<?php } ?>


</a>

<span class="pic-caption left-to-right">
		        <div class="staffboard-title"><h1><?php echo $staffdata[ 'staff-first-name' ]; ?> <?php echo $staffdata[ 'staff-last-name' ]; ?></h1>
		        <p><?php echo $staffdata[ 'staff-position' ]; ?></p></div>
                <a class="btn-success" href="#openModal-<?php echo $count?>">Read More</a>
		    </span>
           
</div>
</div>



<div id="openModal-<?php echo $count?>" class="modalDialog">
	<div>
    <a href="#close" title="Close" class="close">X</a>
    <span class="modal-pic"><?php if ( has_post_thumbnail() ) {
the_post_thumbnail('staff-thumb');
} else { ?>
<img src="https://bebraven.org/wp-content/uploads/2015/08/braven_profile.jpg" alt="<?php the_title(); ?>" />
<?php } ?></span>
 <div class="modal-tag"><strong><?php echo $staffdata[ 'staff-first-name' ]; ?> <?php echo $staffdata[ 'staff-last-name' ]; ?></strong>
 <?php echo $staffdata[ 'staff-position' ]; ?><br />
<span><b>Hometown:</b></span> <?php echo $staffdata[ 'staff-hometown' ]; ?><br />
<p class="education"><b>Education:</b> <?php echo $staffdata[ 'staff-education' ]; ?></p>
 </div>
 <hr />
<div class="modal-bio"><?php the_content();?></div>
</div>
</div>


<?php $count++; ?>
<?php wp_reset_postdata(); ?>

<?php endwhile;?>
<?php endif; ?>

<div class="clear"></div>

</div>


<?php 
$count = 1;
$boardargs = array( 'post_type' => 'staff', 
'staff_categories' => 'board-member',
 'posts_per_page' => -1 );
$board_query = new WP_Query( $boardargs ); 
?>
<?php if ( $board_query->have_posts() ) : ?>

	<div class="boardmembers">

<h2 style="text-align:center;">BRAVEN BOARD OF STAFF</h2>

<?php while ( $board_query->have_posts() ) : $board_query->the_post();
$boarddata = get_post_meta( $board_query->post->ID, 'staff', true ); ?>



<div class="staff one_quarter">
<div class="pic pic-3d">
<a href="<?php echo $boarddata[ 'boardlink' ]; ?>" target="_blank"><?php echo the_post_thumbnail('staff-thumb');?></a>
<span class="pic-caption left-to-right">
		        <div class="staffboard-title"><h1><?php echo $staffdata[ 'staff-first-name' ]; ?> <?php echo $staffdata[ 'staff-last-name' ]; ?></h1>
		        <p><?php echo $boarddata[ 'staff-position' ]; ?></p></div>
                 <a class="btn-success" href="#openModalboard-<?php echo $count?>">Read More</a>
		    </span>
</div>
</div>

<div id="openModalboard-<?php echo $count?>" class="modalDialog">
	<div>
    <a href="#close" title="Close" class="close">X</a>
    <span class="modal-pic"><?php echo the_post_thumbnail('staff-thumb');?></span>
 <div class="modal-tag"><strong><?php echo $staffdata[ 'staff-first-name' ]; ?> <?php echo $staffdata[ 'staff-last-name' ]; ?></strong>
 <?php echo $boarddata[ 'staff-position' ]; ?>
 </div>
<div class="modal-bio"><?php the_content();?></div>
</div>
</div>



<?php wp_reset_postdata(); ?>


<?php $count++; ?>
<?php endwhile;?>
<?php endif; ?>

<div class="clear"></div>

</div>



		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>
