<?php get_header() ?>
<?php the_post() ?>
<!--brings in post name of page and assigns it a class-->
<div id="blog_article_wrapper" class="<?= $post->post_name ?>-page">
<h1><?php the_title() ?></h1>

	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
			<h2><a href="<?php the_permalink(); // link to the page or posting ?>"><?php the_title(); // get the page or posting title ?></a></h2>
		<?php the_content(''); // get page or posting written content ?>
		
		<?php endwhile; endif; // end the loop ?>

</div><!--end wrapper-->

<?php get_footer() ?>	