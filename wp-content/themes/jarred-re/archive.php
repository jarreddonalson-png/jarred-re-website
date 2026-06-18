<?php get_header(); ?>

<?php
$post_type = get_post_type();
$label     = get_post_type_object( $post_type ) ? get_post_type_object( $post_type )->labels->name : 'Posts';
?>

<section style="background:var(--black); padding:140px 0 var(--space-lg);">
    <div class="container">
        <?php if ( is_category() || is_tag() || is_archive() ) : ?>
            <span class="eyebrow"><?php echo esc_html( $label ); ?></span>
            <h1 style="color:var(--white)"><?php the_archive_title(); ?></h1>
            <?php the_archive_description( '<p class="lead" style="color:rgba(255,255,255,0.65);max-width:600px;margin-top:var(--space-sm)">', '</p>' ); ?>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="<?php echo $post_type === 'neighborhood' ? 'grid-3' : 'blog-grid'; ?>">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php if ( $post_type === 'neighborhood' ) : ?>
                        <a href="<?php the_permalink(); ?>" class="neighborhood-card">
                            <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'jarred-neighborhood', [ 'alt' => get_the_title() ] ); else : ?>
                                <div style="width:100%;height:100%;background:var(--gray-300)"></div>
                            <?php endif; ?>
                            <div class="neighborhood-card__overlay">
                                <div class="neighborhood-card__name"><?php the_title(); ?></div>
                                <div class="neighborhood-card__sub"><?php echo esc_html( get_post_meta( get_the_ID(), 'neighborhood_tagline', true ) ); ?></div>
                            </div>
                        </a>
                    <?php else : ?>
                        <article class="card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'jarred-blog', [ 'class' => 'card__image', 'alt' => get_the_title() ] ); ?></a>
                            <?php endif; ?>
                            <div class="card__body">
                                <div class="card__eyebrow"><?php echo get_the_category_list( ' · ' ); ?></div>
                                <h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="card__excerpt"><?php the_excerpt(); ?></p>
                                <div class="post-meta"><span><?php echo get_the_date(); ?></span></div>
                            </div>
                        </article>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>

            <div style="margin-top:var(--space-lg); text-align:center">
                <?php the_posts_pagination( [ 'prev_text' => '← Newer', 'next_text' => 'Older →' ] ); ?>
            </div>

        <?php else : ?>
            <p style="text-align:center; color:var(--gray-500)">Nothing here yet — check back soon.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
