<?php /* Template Name: About */ get_header(); ?>

<?php
$agent_name  = get_theme_mod( 'agent_name',      'Jarred' );
$agent_title = get_theme_mod( 'agent_title',     'REALTOR®' );
$agent_photo = get_theme_mod( 'agent_photo',     '' );
?>

<!-- Page Hero -->
<section style="background:var(--black); padding:160px 0 var(--space-xl);">
    <div class="container">
        <span class="eyebrow">Get to Know Me</span>
        <h1 style="color:var(--white); max-width:700px;">A Kansas City Agent<br>Who Actually <em style="font-style:normal;color:var(--gold)">Listens</em></h1>
    </div>
</section>

<!-- About content -->
<section class="section">
    <div class="container">
        <div class="about-split">
            <div class="about-split__image">
                <?php if ( $agent_photo ) : ?>
                    <img src="<?php echo esc_url( $agent_photo ); ?>" alt="<?php echo esc_attr( $agent_name ); ?>">
                <?php else : ?>
                    <div style="width:100%;aspect-ratio:4/5;background:var(--gray-100);display:flex;align-items:center;justify-content:center;border-radius:var(--radius);font-size:5rem;">👤</div>
                <?php endif; ?>
            </div>
            <div>
                <span class="eyebrow"><?php echo esc_html( $agent_title ); ?></span>
                <span class="gold-rule"></span>
                <?php
                while ( have_posts() ) { the_post();
                    echo '<div class="post-content">';
                    the_content();
                    echo '</div>';
                }
                ?>
                <div style="margin-top:var(--space-md);">
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary" style="margin-right:1rem">Work With Me</a>
                    <a href="tel:<?php echo esc_attr( preg_replace('/\D/', '', get_theme_mod('agent_phone','')) ); ?>" class="btn btn--outline-dark"><?php echo esc_html( get_theme_mod( 'agent_phone', 'Call Me' ) ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Credentials bar -->
<section class="section--offwhite section--sm">
    <div class="container">
        <div class="grid-4">
            <?php
            $creds = [
                [ '10+',    'Years in Real Estate' ],
                [ '150+',   'Transactions Closed'  ],
                [ 'KC',     'Hometown Expert'       ],
                [ '5 ★',    'Client Satisfaction'  ],
            ];
            foreach ( $creds as $c ) : ?>
                <div class="stat-item" style="text-align:left; padding:var(--space-sm) 0; border-bottom:2px solid var(--gold)">
                    <div class="stat-item__number" style="font-size:2rem; color:var(--black)"><?php echo esc_html( $c[0] ); ?></div>
                    <div class="stat-item__label" style="color:var(--gray-500)"><?php echo esc_html( $c[1] ); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
