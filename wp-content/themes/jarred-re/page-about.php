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
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/agent-photo.jpg" alt="<?php echo esc_attr( $agent_name ); ?>" loading="lazy">
</div>
            <div>
                <span class="eyebrow"><?php echo esc_html( $agent_title ); ?></span>
                <span class="gold-rule"></span>
                <div class="post-content">
                    <p>Jarred Donalson is a licensed REALTOR® serving buyers, sellers, and investors across the Kansas City metro area and St. Joseph, Missouri — with a specialty in first-time home buyers, move-up buyers ready for more space, and homeowners looking to downsize.</p>

                    <p>A born-and-raised Kansas Citian, Jarred has spent his entire adult life here — and that love for this city shows up in the way he works. Before earning his real estate license, he completed a master's degree in counseling, which shaped everything about how he serves clients: he listens first, asks the right questions, and builds a plan tailored to <em>your</em> situation before anything else happens.</p>

                    <p>Over the past nine years, Jarred has guided hundreds of Kansas City families through one of the biggest decisions of their lives. He especially enjoys working with <strong>first-time buyers</strong> navigating the process for the first time, <strong>move-up buyers</strong> who've outgrown their current home and are ready for the one that actually fits their life, and <strong>empty nesters</strong> ready to trade square footage for the right fit. What his clients consistently say: the process felt calmer than they expected.</p>

                    <p>That's by design. Jarred works alongside a dedicated administrative team to handle the details — so he can stay focused on strategy, communication, and making sure you're never left wondering what comes next. He also coaches and trains other real estate agents, which keeps his skills sharp and his knowledge current.</p>

                    <p>If you're thinking about buying or selling in Kansas City — whether you're ready to move next month or just starting to think it through — Jarred is the kind of agent who will give you a real plan, not a sales pitch.</p>

                    <p>Licensed in Missouri and Kansas.</p>
                </div>
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
                [ '9+',     'Years in Real Estate' ],
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
