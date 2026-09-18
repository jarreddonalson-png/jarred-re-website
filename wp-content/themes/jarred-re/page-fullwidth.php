<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 */
get_header(); ?>

<section style="background:var(--black); padding:75px 0 var(--space-sm);">
    <div class="container">
        <h1 style="color:var(--white)"><?php the_title(); ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="post-content"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>