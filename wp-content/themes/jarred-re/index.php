<?php
/**
 * index.php — fallback template (used for blog home if no static front page).
 */
get_header(); ?>

<section style="background:var(--black); padding:140px 0 var(--space-lg);">
    <div class="container">
        <span class="eyebrow">Market Insights &amp; Tips</span>
        <h1 style="color:var(--white)">The Blog</h1>
        <p class="lead" style="color:rgba(255,255,255,0.65); max-width:560px; margin-top:var(--space-sm)">Neighborhood guides, buying tips, market updates, and more from a Kansas City REALTOR® who tells it straight.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="blog-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'jarred-blog', [ 'class' => 'card__image', 'alt' => get_the_title() ] ); ?></a>
                        <?php endif; ?>
                        <div class="card__body">
                            <div class="card__eyebrow"><?php echo get_the_category_list( ' · ' ); ?></div>
                            <h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="card__excerpt"><?php the_excerpt(); ?></p>
                            <div class="post-meta">
                                <span><?php echo get_the_date(); ?></span>
                                <span><?php the_author(); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div style="margin-top:var(--space-lg); text-align:center">
                <?php the_posts_pagination( [ 'prev_text' => '← Newer', 'next_text' => 'Older →' ] ); ?>
            </div>
        <?php else : ?>
            <p style="text-align:center; color:var(--gray-500)">No posts yet. Check back soon!</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
