<?php
$agent_name  = get_theme_mod( 'agent_name',      'Jarred' );
$agent_title = get_theme_mod( 'agent_title',     'REALTOR®' );
$phone       = get_theme_mod( 'agent_phone',     '' );
$email       = get_theme_mod( 'agent_email',     '' );
$brokerage   = get_theme_mod( 'agent_brokerage', 'Keller Williams KC North' );
$facebook    = get_theme_mod( 'facebook_url',    '' );
$instagram   = get_theme_mod( 'instagram_url',   '' );
$linkedin    = get_theme_mod( 'linkedin_url',    '' );
$year        = date( 'Y' );

// Footer contact block
$footer_brand_name  = get_theme_mod( 'footer_brand_name',  'Reside in Kansas City' );
$footer_brand_phone = get_theme_mod( 'footer_brand_phone', '816-719-0829' );
$footer_brand_email = get_theme_mod( 'footer_brand_email', 'jarred.donalson@kw.com' );
$brokerage_phone    = get_theme_mod( 'brokerage_phone',    '816-452-4200' );
$brokerage_address  = get_theme_mod( 'brokerage_address',  '310 NW Englewood Rd, Kansas City, MO 64118' );
?>

</main><!-- /#main -->

<footer class="site-footer" aria-label="Site footer">
    <div class="container">
        <div class="footer-grid">

    <!-- Brand column -->
<div class="footer-brand footer-brand--split">
    <div class="footer-brand-block">
        <h5><?php echo esc_html( $footer_brand_name ); ?></h5>
        <?php if ( $footer_brand_phone ) : ?>
            <p><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $footer_brand_phone ) ); ?>"><?php echo esc_html( $footer_brand_phone ); ?></a></p>
        <?php endif; ?>
        <?php if ( $footer_brand_email ) : ?>
            <p><a href="mailto:<?php echo esc_attr( $footer_brand_email ); ?>"><?php echo esc_html( $footer_brand_email ); ?></a></p>
        <?php endif; ?>
    </div>

    <div class="footer-brand-block">
        <h5><?php echo esc_html( $brokerage ); ?></h5>
        <?php if ( $brokerage_phone ) : ?>
            <p><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $brokerage_phone ) ); ?>"><?php echo esc_html( $brokerage_phone ); ?></a></p>
        <?php endif; ?>
        <?php if ( $brokerage_address ) : ?>
            <p><?php echo esc_html( $brokerage_address ); ?></p>
        <?php endif; ?>
    </div>
</div>


            <!-- Quick Links -->
            <div class="footer-col">
                <h5><?php esc_html_e( 'Quick Links', 'jarred-re' ); ?></h5>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer-1',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'fallback_cb'    => function() {
                        echo '<ul>
                            <li><a href="' . esc_url( home_url( '/about' ) ) . '">About Me</a></li>
                            <li><a href="' . esc_url( home_url( '/neighborhoods' ) ) . '">Neighborhoods</a></li>
                            <li><a href="' . esc_url( home_url( '/blog' ) ) . '">Blog</a></li>
                            <li><a href="' . esc_url( home_url( '/contact' ) ) . '">Contact</a></li>
                        </ul>';
                    },
                ] );
                ?>
            </div>

            <!-- Resources -->
            <div class="footer-col">
                <h5><?php esc_html_e( 'Resources', 'jarred-re' ); ?></h5>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer-2',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'fallback_cb'    => function() {
                        echo '<ul>
                            <li><a href="' . esc_url( home_url( '/resources/buyers' ) ) . '">Buyer Resources</a></li>
                            <li><a href="' . esc_url( home_url( '/resources/sellers' ) ) . '">Seller Resources</a></li>
                            <li><a href="' . esc_url( home_url( '/resources/first-time-buyers' ) ) . '">First-Time Buyers</a></li>
                        </ul>';
                    },
                ] );
                ?>
            </div>

            <!-- Social -->
            <div class="footer-col">
                <h5><?php esc_html_e( 'Follow', 'jarred-re' ); ?></h5>
                <div class="footer-social" style="margin-bottom:1rem">
                    <?php if ( $facebook ) : ?>
                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook">f</a>
                    <?php endif; ?>
                    <?php if ( $instagram ) : ?>
                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $linkedin ) : ?>
                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">in</a>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- /.footer-grid -->

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html( $year ); ?> <?php echo esc_html( $agent_name ); ?>. All rights reserved.</p>
            <div style="display:flex; gap:1.5rem; font-size:0.8rem;">
                <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>" style="color:rgba(255,255,255,0.4); transition:color 200ms ease" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">Privacy Policy</a>
                <a href="<?php echo esc_url( home_url( '/sitemap.xml' ) ); ?>" style="color:rgba(255,255,255,0.4); transition:color 200ms ease" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">Sitemap</a>
            </div>
        </div>

        <p class="realtor-disclaimer">
            <?php
            printf(
                esc_html__( '%1$s is a licensed real estate agent in the State of Missouri%2$s. Information deemed reliable but not guaranteed. Equal Housing Opportunity.', 'jarred-re' ),
                esc_html( $agent_name ),
                $brokerage ? ' with ' . esc_html( $brokerage ) : ''
            );
            ?>
        </p>

    </div><!-- /.container -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
