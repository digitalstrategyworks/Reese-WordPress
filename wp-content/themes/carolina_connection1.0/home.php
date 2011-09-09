<?php get_header(); ?>



<div id="content" class="section">

<?php bf_above_content() ?>





<?php bf_above_index_news(); ?>



<?php if ( function_exists(‘show_featured_post’) )?>



<?php if ( function_exists('show_featured_post') )

 if (is_home() && !is_paged())

  show_featured_post('<span class="container">','</span>');

?>



<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) !== 0) : $wp_query->next_post(); else : the_post(); ?>



<div id="left-column">

 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>



<?php the_excerpt(); ?>

</div>



<?php endif; endwhile; else: ?>

<div>Alternate content</div>

<?php endif; ?>



<?php $i = 0; rewind_posts(); ?>



<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) == 0) : $wp_query->next_post(); else : the_post(); ?>



<div id="right-column">

 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>



<?php the_excerpt(); ?>

</div>



<?php endif; endwhile; else: ?>

<div>Alternate content</div>

<?php endif; ?>





<?php bf_below_index_news(); ?>



<?php bf_below_content() ?>

</div><!-- #content -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>