<?php
/**
 * Front Page Template
 * Sections: Hero → Stats → About Preview → Neighborhoods → Resources Preview → Blog Preview → CTA
 */
get_header();

$agent_name      = get_theme_mod( 'agent_name',      'Jarred' );
$agent_title     = get_theme_mod( 'agent_title',     'REALTOR® | Kansas City' );
$agent_bio_short = get_theme_mod( 'agent_bio_short', 'Helping Kansas City families find their next home with honesty, expertise, and care.' );
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero" aria-label="Introduction">
    <div class="hero__bg" style="--hero-bg: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-bg.jpg')"></div>
    <div class="hero__content">
        <span class="eyebrow"><?php echo esc_html( $agent_title ); ?></span>
        <h1>Your Kansas City<br><em>Real Estate Expert</em></h1>
        <p class="lead"><?php echo esc_html( $agent_bio_short ); ?></p>
        <div class="hero__actions">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary">Let's Talk</a>
            <a href="<?php echo esc_url( home_url( '/neighborhoods' ) ); ?>" class="btn btn--outline">Explore Neighborhoods</a>
        </div>
    </div>
</section>

<!-- ============================================================
     STATS BAR
     ============================================================ -->
<div class="stats-bar" aria-label="Agent statistics">
    <div class="stats-bar__inner container">
        <div class="stat-item">
            <div class="stat-item__number">150+</div>
            <div class="stat-item__label">Homes Sold</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">10+</div>
            <div class="stat-item__label">Years Experience</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">5★</div>
            <div class="stat-item__label">Average Rating</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">KC</div>
            <div class="stat-item__label">Local Expert</div>
        </div>
    </div>
</div>

<!-- ============================================================
     ABOUT PREVIEW
     ============================================================ -->
<section class="section section--offwhite" aria-label="About Jarred">
    <div class="container">
        <div class="about-split">
            <div class="about-split__image">
                <?php
                $agent_photo = get_theme_mod( 'agent_photo', '' );
                if ( $agent_photo ) {
                    echo '<img src="' . esc_url( $agent_photo ) . '" alt="' . esc_attr( $agent_name ) . '" loading="lazy">';
                } else {
                    echo '<div style="width:100%;aspect-ratio:4/5;background:var(--gray-100);display:flex;align-items:center;justify-content:center;border-radius:var(--radius);color:var(--gray-300);font-size:5rem;">👤</div>';
                }
                ?>
            </div>
            <div class="about-split__body">
                <span class="eyebrow">About Me</span>
                <span class="gold-rule"></span>
                <h2>I Know These Streets.<br>I'll Fight for Your Deal.</h2>
                <p class="lead">Kansas City isn't just my market — it's my home. I've spent over a decade learning every neighborhood, price trend, and hidden gem so you don't have to.</p>
                <p>Whether you're buying your first home, upsizing, or preparing to sell, I bring a calm, straightforward approach backed by real data and genuine care for your outcome.</p>
                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn--ghost">My Story</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     NEIGHBORHOODS
     ============================================================ -->
<section class="section section--dark" aria-label="Neighborhoods">
    <div class="container">
        <div class="section-header section-header--center">
            <span class="eyebrow" style="color:var(--gold)">Where You'll Live</span>
            <span class="gold-rule" style="margin:0 auto var(--space-md)"></span>
            <h2 style="color:var(--white)">Kansas City Neighborhoods</h2>
            <p class="lead" style="color:rgba(255,255,255,0.65); max-width:560px; margin:0 auto;">From Brookside to the Crossroads, every neighborhood has its own pulse. Let me show you where you belong.</p>
        </div>

        <?php
        $neighborhoods = new WP_Query( [
            'post_type'      => 'neighborhood',
            'posts_per_page' => 6,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ] );
        ?>

        <?php if ( $neighborhoods->have_posts() ) : ?>
            <div class="grid-3" style="margin-bottom:var(--space-md)">
                <?php while ( $neighborhoods->have_posts() ) : $neighborhoods->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="neighborhood-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'jarred-neighborhood', [ 'alt' => get_the_title() ] ); ?>
                        <?php else : ?>
                            <div style="width:100%;height:100%;background:var(--gray-700);"></div>
                        <?php endif; ?>
                        <div class="neighborhood-card__overlay">
                            <div class="neighborhood-card__name"><?php the_title(); ?></div>
                            <div class="neighborhood-card__sub"><?php echo esc_html( get_post_meta( get_the_ID(), 'neighborhood_tagline', true ) ); ?></div>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p style="text-align:center; color:rgba(255,255,255,0.4)">Neighborhood guides coming soon.</p>
        <?php endif; ?>

        <div class="text-center">
            <a href="<?php echo esc_url( home_url( '/neighborhoods' ) ); ?>" class="btn btn--outline">All Neighborhoods</a>
        </div>
    </div>
</section>

<!-- ============================================================
     BUYER / SELLER RESOURCES PREVIEW
     ============================================================ -->
<section class="section" aria-label="Buyer and Seller Resources">
    <div class="container">
        <div class="section-header section-header--center">
            <span class="eyebrow">Knowledge is Power</span>
            <span class="gold-rule" style="margin:0 auto var(--space-md)"></span>
            <h2>Buyer &amp; Seller Resources</h2>
            <p class="lead" style="max-width:540px; margin:0 auto;">Everything you need to make a confident, well-informed decision — free guides, checklists, and market insights.</p>
        </div>

        <div class="grid-2">
            <!-- Buyers card -->
            <div class="card" style="padding:var(--space-md)">
                <span class="eyebrow">For Buyers</span>
                <h3 style="margin-bottom:var(--space-sm)">Ready to Buy?</h3>
                <p style="color:var(--gray-500); margin-bottom:var(--space-md)">From pre-approval to closing day, I'll guide you through every step. Grab my free checklist to start your journey.</p>
                <ul style="margin-bottom:var(--space-md); display:flex; flex-direction:column; gap:8px;">
                    <?php
                    $buyer_items = [ 'How to get pre-approved', 'What to look for at showings', 'Understanding the offer process', 'What closing costs to expect' ];
                    foreach ( $buyer_items as $item ) :
                    ?>
                        <li style="display:flex; align-items:center; gap:8px; font-size:0.9rem; color:var(--gray-700);">
                            <span style="color:var(--gold); font-size:1rem;">✓</span> <?php echo esc_html( $item ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url( home_url( '/resources/buyers' ) ); ?>" class="btn btn--primary">Buyer Resources</a>
            </div>

            <!-- Sellers card -->
            <div class="card" style="padding:var(--space-md); background:var(--black); border-color:transparent;">
                <span class="eyebrow" style="color:var(--gold)">For Sellers</span>
                <h3 style="margin-bottom:var(--space-sm); color:var(--white)">Ready to Sell?</h3>
                <p style="color:rgba(255,255,255,0.55); margin-bottom:var(--space-md)">Maximize your home's value with the right pricing, staging, and marketing strategy. Let's get you top dollar.</p>
                <ul style="margin-bottom:var(--space-md); display:flex; flex-direction:column; gap:8px;">
                    <?php
                    $seller_items = [ 'How to price your home right', 'Pre-listing improvements worth making', 'Professional photography & marketing', 'Navigating multiple offers' ];
                    foreach ( $seller_items as $item ) :
                    ?>
                        <li style="display:flex; align-items:center; gap:8px; font-size:0.9rem; color:rgba(255,255,255,0.7);">
                            <span style="color:var(--gold); font-size:1rem;">✓</span> <?php echo esc_html( $item ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url( home_url( '/resources/sellers' ) ); ?>" class="btn btn--primary">Seller Resources</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     BLOG PREVIEW
     ============================================================ -->
<section class="section section--offwhite" aria-label="Recent Articles">
    <div class="container">
        <div class="section-header" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1rem; margin-bottom:var(--space-lg)">
            <div>
                <span class="eyebrow">Market Insights</span>
                <h2 style="margin:0">Latest from the Blog</h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn--ghost">All Articles</a>
        </div>

        <?php
        $blog_posts = new WP_Query( [
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'ignore_sticky_posts' => true,
        ] );
        ?>

        <?php if ( $blog_posts->have_posts() ) : ?>
            <div class="blog-grid">
                <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
                    <article class="card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'jarred-blog', [ 'class' => 'card__image', 'alt' => get_the_title() ] ); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card__body">
                            <div class="card__eyebrow"><?php echo get_the_category_list( ' · ' ); ?></div>
                            <h3 class="card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="card__excerpt"><?php the_excerpt(); ?></p>
                            <div class="post-meta">
                                <span><?php echo get_the_date(); ?></span>
                                <span><?php echo esc_html( get_the_author() ); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p style="text-align:center; color:var(--gray-500)">Blog posts coming soon.</p>
        <?php endif; ?>
    </div>
</section>

<!-- ============================================================
     BOTTOM CTA
     ============================================================ -->
<section class="section section--gold" aria-label="Call to action">
    <div class="container text-center">
        <span class="eyebrow" style="color:rgba(0,0,0,0.5)">Ready when you are</span>
        <h2 style="margin-bottom:var(--space-sm)">Let's Find Your Next Home</h2>
        <p style="max-width:500px; margin:0 auto var(--space-md); color:rgba(0,0,0,0.7);">No pressure, no hard sell — just an honest conversation about what you're looking for and how I can help.</p>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--outline-dark">Start the Conversation</a>
    </div>
</section>

<?php get_footer(); ?>
