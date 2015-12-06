<?php get_header();?>
<!----------single.php------------>
<!-----------------This is for displaying a single post------------------->

<div id="content">
    
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <article class="full-post">
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    	<div id="featured-img"><?php the_post_thumbnail(); ?></div>
        <div class="full-content">
        <?php the_content(); ?>
        
    <div class="author">
        
        <?php echo get_avatar( get_the_author_meta( 'email' ), '50', 'Mystery Man',
			' ' . get_the_author_meta( 'first_name' ) . '
			' . get_the_author_meta( 'last_name' )); ?>
        <strong>Posted by: <?php the_author_posts_link(); ?> </strong>    
        <?php if( get_the_author_meta( 'discription')) { ?>
        <p><?php the_author_meta( 'discription' ); ?></p>
        <?php } ?>
        
		<p>
        	<?php echo "Posted on: "; ?>
        	<time datetime="<?php the_time('Y-m-d'); ?>">
            	<?php the_time('M j, Y'); ?>
           	</time>
		</p>
        <p> Listed in <?php the_category(", "); ?>
		
    </div><!-- author -->
    
        
       <?php the_post_thumbnail(); ?>
       
    	<ul class="postnav">
        	<?php previous_post_link("<li>%link", "&lt; Previous Post"); ?> 					     		
			<?php next_post_link("%link</li>", "  Next Post &gt;  "); ?>
        </ul>
    	
    
    </article>
    
        
    <?php endwhile; else: ?>
    	<p>Sorry no posts to display</p>
    <?php endif; ?>
<div class="comments">
   <?php comments_template(); ?>
</div><!-- #comments --> 
   
</div><!-- #content -->   

<?php get_footer(); ?>

</body>
</html>