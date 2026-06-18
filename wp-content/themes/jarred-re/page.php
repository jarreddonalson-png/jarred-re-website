<?php get_header(); ?>

<section style="background:var(--black); padding:140px 0 var(--space-lg);">
    <div class="container">
        <h1 style="color:var(--white)"><?php the_title(); ?></h1>
    </div>
</section>

<section class="section">
    <div class="container container--narrow">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="post-content"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
