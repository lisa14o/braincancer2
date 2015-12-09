<?php /* Template Name: Default Gateway */ ?>
<?php get_header() ?>
<?php the_post() ?>
<!--brings in post name of page and assigns it a class-->
<div id="gateway_wrapper" class="<?= $post->post_name ?>-page">
<h1><?php the_title() ?></h1>

<?php the_content() ?>

<?php
$query = new WP_Query(array( "post_parent" => $post->ID, "post_type" => "page" ));
while ($query->have_posts()) : $query->the_post();
?>
	<h2><?php the_title() ?></h2>

<?php endwhile; wp_reset_postdata(); ?>

</div><!--end maincontent-->

<?php get_footer() ?>