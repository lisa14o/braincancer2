<?php /* Template Name: Team Gateway */ ?>
<?php get_header() ?>
<?php the_post() ?>
<div id="gateway_wrapper" class="<?= $post->post_name ?>-page">
<h1><?php the_title() ?></h1>

<?php the_content() ?>

<?php
$query = new WP_Query(array( "post_parent" => $post->ID, "post_type" => "page" ));
while ($query->have_posts()) : $query->the_post();
?>
	<?php the_post_thumbnail() ?>

	<h2><?php the_title() ?></h2>

<?php endwhile; wp_reset_postdata(); ?>

</div><!--end wrapper-->

<?php get_footer() ?>