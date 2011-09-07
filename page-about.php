<?php
/**
 * Template Name: About
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
					<img src="./wp-content/themes/azpcc/img/header_about.png" style="float: left;"/><p>AZPCC was founded in 1988 and is dedicated to the highest standards of excellence in fetal diagnosis and ultrasound.  We have State-of-the-Art equipment, technology and facilities with our ultrasound rooms being set up with large screen monitors so that you and your family can view your exam.  Each room also has its own private restroom facilities.</p> 
					
					<p>Our clinical staff are all board certified in their respective specialties and have many years of experience and expertise.  We are also committed to giving you the best possible patient care from the time of scheduling your appointment to the completion of your visit.  In short we want to make your "AZPCC Experience" the best it can be.</p> 
					
					<p>Learn more about our team below</p> 
				</section> 
				<nav class="secondary"> 
						<ul> 
							<li class="Clinical"><a href="#Clinical">Clinical Physicians</a></li> 
							<li class="Medical"><a href="#Medical">Medical Assistants</a></li> 
							<li class="Office"><a href="#Office">Scheduling and Office Staff</a></li> 
							<li class="Admin"><a href="#Admin">Administration</a></li> 
					  </ul> 
				</nav> 
				<div class="clear"></div> 
				<div id="#doctors">
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
