<?php

get_header();?>

<!-----archive.php-------->
	
<div id="content">
    <h2><?php
	if (is_day()) _e('You are viewing the ' . get_the_date() . ' daily post archive');
	elseif (is_month()) _e('You are viewing the ' . get_the_date('F Y') . ' post archive');
	elseif (is_year()) _e('You are viewing the ' . get_the_date('Y') . ' post archive');
	elseif (is_author()) _e('You are viewing the author post archive');
	else _e( 'You are viewing the "' . single_cat_title('',false) . '" post archive');
	?></h2>
    
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
    	<p>Sorry no posts to display</p>
        
    <?php endif; ?>
   
<br />  
   
 
</div><!-- #content -->   

<?php get_footer(); ?>
