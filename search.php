<?php

get_header();?>

<!---------search.php----------->
	
<div id="content">
    <h2><? _e( 'Search results for "' . get_search_query() . '"'); ?></h2>
    
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    
    
    <article class="halfcol left">
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_post_thumbnail(); ?>
        
        <p><?php the_content(); ?></p>
   </article>      
        <p><small>Posted
   			<time datetime="<?php the_time('Y-m-d'); ?>">
    		<?php the_time('M j'); ?>
    		</time>
    	by <?php the_author(); ?>
    	<?php comments_number("0 comments", "1 comment", "% comments"); ?>
		</small></p>    
		
    <br /><hr /><br />
	
	<?php endwhile; 
	get_search_form();
	else: ?>
    	<p><?php _e( 'Sorry, your search for "' . get_search_query() . '" returned no results.'); ?></p>
    
    <?php endif; ?>
   
   <br><br>
   

   
</div><!-- #content -->   

<?php get_footer(); ?>
