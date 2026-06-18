<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<article itemscope itemtype="https://schema.org/BlogPosting">
    <!-- Post hero -->
    <section style="background:var(--black); padding:140px 0 var(--space-lg); position:relative; overflow:hidden;">
        <?php if ( has_post_thumbnail() ) : ?>
            <div style="position:absolute;inset:0;opacity:0.25;">
                <?php the_post_thumbnail( 'jarred-hero', [ 'style' => 'width:100%;height:100%;object-fit:cover;' ] ); ?>
            </div>
        <?php endif; ?>
        <div class="container" style="position:relative; z-index:2;">
            <div style="display:flex; gap:8px; margin-bottom:var(--space-sm); flex-wrap:wrap;">
                <?php
                $categories = get_the_category();
                foreach ( $categories as $cat ) :
                ?>
                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" style="font-size:0.7rem;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--gold);text-decoration:none">
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <h1 style="color:var(--white); max-width:760px;" itemprop="headline"><?php the_title(); ?></h1>
            <div class="post-meta" style="color:rgba(255,255,255,0.5); margin-top:var(--space-sm)">
                <span itemprop="author"><?php echo get_the_author(); ?></span>
                <span><time itemprop="datePublished" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></span>
                <span><?php echo reading_time_estimate(); ?></span>
            </div>
        </div>
    </section>

    <!-- Post body -->
    <section class="section">
        <div class="container container--narrow">
            <div class="post-content" itemprop="articleBody">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <?php the_tags( '<div style="margin-top:var(--space-md); display:flex; gap:8px; flex-wrap:wrap;">', '', '</div>' ); ?>

            <!-- Nav between posts -->
            <div style="display:flex; justify-content:space-between; margin-top:var(--space-lg); padding-top:var(--space-md); border-top:1px solid var(--gray-100); flex-wrap:wrap; gap:1rem;">
                <?php previous_post_link( '<div>← %link</div>' ); ?>
                <?php next_post_link( '<div>%link →</div>' ); ?>
            </div>
        </div>
    </section>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>

<?php
function reading_time_estimate() {
    $content    = get_the_content();
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes    = max( 1, round( $word_count / 200 ) );
    return $minutes . ' min read';
}
?>
