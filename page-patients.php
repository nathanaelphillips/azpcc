<?php
/**
 * Template Name: Patients
	The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	</header> 
 
		<div class="content-top"></div> 
		<div id="main" class="content" role="main" > 
				<section id="intro"> 
					<img src="./wp-content/themes/azpcc/img/header_patients.png" style="float: left;"/><p>At AZPCC we are committed to giving you the best possible patient care.  By reviewing these pages regarding your appointment you can help us make sure that your "AZPCC Experience" is the best that it can be.</p> 
				</section> 
				<nav class="secondary"> 
						<ul> 
							<li class="Insurance"><a href="#Insurance">Insurance</a></li> 
								<li class="Forms"><a href="#Forms">Forms</a></li> 
								<li class="Instructions"><a href="#Instructions">Instructions</a></li> 
								<li class="Referrals"><a href="#Referrals">Referrals</a></li> 
								<li class="Authorization"><a href="#Authorization">Authorization</a></li> 
					  </ul> 
				</nav> 
				<div class="clear"></div> 
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<!--<div <?php post_class();?>>
				<h2><?php the_title(); ?></h2>
				<?php edit_post_link('Edit', '<div class="editlink">', '</div>'); ?>

				<?php the_content('<p>'.the_title('', '', false).' - continue reading &raquo;</p>'); ?>-->
			<?php
				$my_slug = get_permalink();
				$args = array(
					'numberposts' => -1,
					'post_parent' => $post->ID,
					'post_type' => 'page',
					'post_status' => 'publish',
					'orderby' => 'menu_order,title',
					'order' => 'ASC'
				);
				$my_pagelist = &get_children($args);
				if ($my_pagelist) :
					foreach($my_pagelist as $my_child) : 
					//foreach(ass_array_shuffle($my_pagelist) as $my_child) : 
					$my_child_slug = $my_slug.$my_child->post_name.'/';
			?>
			<section id=<?php echo $my_child->post_title;?> class="info">
				<?php echo $my_child->post_content; ?>
			<!-- end mini -->
			</section>
			<?php endforeach; ?>
			<?php endif; ?>

			<?php wp_link_pages('before=<p class="pages">Page: &after=</p>&next_or_number=number'); ?>

			</div>
			<?php endwhile; endif; ?>

		<div class="content-bottom"></div>
		
<?php get_footer(); ?>
<?php
//shuffle an associative array & maintain indexes
function ass_array_shuffle($array) {
    while (count($array) > 0) {
        $val = array_rand($array);
        $new_arr[$val] = $array[$val];
        unset($array[$val]);
    }
    return $new_arr;
}
?>
