<?php /* Template Name: Contact */ get_header(); ?>

<section style="background:var(--black); padding:160px 0 var(--space-xl);">
    <div class="container">
        <span class="eyebrow">Let's Connect</span>
        <h1 style="color:var(--white)">Get in <em style="font-style:normal;color:var(--gold)">Touch</em></h1>
        <p class="lead" style="color:rgba(255,255,255,0.65); max-width:540px; margin-top:var(--space-sm)">Whether you're buying, selling, or just exploring your options — reach out. No pressure, just a real conversation.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid-2" style="gap:var(--space-xl); align-items:flex-start">

            <!-- Form -->
            <div>
                <span class="gold-rule"></span>
                <h2 style="margin-bottom:var(--space-md)">Send a Message</h2>

                <form id="contact-form" novalidate>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="cf-name">Name *</label>
                            <input class="form-input" type="text" id="cf-name" name="name" required autocomplete="name" placeholder="Jane Smith">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="cf-email">Email *</label>
                            <input class="form-input" type="email" id="cf-email" name="email" required autocomplete="email" placeholder="jane@email.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="cf-phone">Phone</label>
                            <input class="form-input" type="tel" id="cf-phone" name="phone" autocomplete="tel" placeholder="(816) 555-0100">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="cf-type">I'm looking to…</label>
                            <select class="form-select form-input" id="cf-type" name="inquiry_type">
                                <option value="Buy a Home">Buy a Home</option>
                                <option value="Sell a Home">Sell a Home</option>
                                <option value="Buy & Sell">Buy &amp; Sell</option>
                                <option value="General Question">General Question</option>
                            </select>
                        </div>
                        <div class="form-group form-group--full">
                            <label class="form-label" for="cf-message">Message *</label>
                            <textarea class="form-textarea" id="cf-message" name="message" required placeholder="Tell me a little about what you're looking for…"></textarea>
                        </div>
                        <div class="form-group--full">
                            <button type="submit" class="btn btn--primary" id="cf-submit" style="width:100%; justify-content:center">
                                <span id="cf-btn-text">Send Message</span>
                            </button>
                        </div>
                    </div>
                    <div id="cf-status" style="margin-top:1rem; display:none; padding:1rem; border-radius:var(--radius); font-size:0.9rem;"></div>
                </form>
            </div>

            <!-- Contact info -->
            <div>
                <span class="gold-rule"></span>
                <h2 style="margin-bottom:var(--space-md)">Direct Contact</h2>

                <?php
                $phone    = get_theme_mod( 'agent_phone', '' );
                $email    = get_theme_mod( 'agent_email', '' );
                $facebook = get_theme_mod( 'facebook_url', '' );
                $insta    = get_theme_mod( 'instagram_url', '' );
                ?>

                <div style="display:flex; flex-direction:column; gap:var(--space-md)">
                    <?php if ( $phone ) : ?>
                    <div style="display:flex; gap:1rem; align-items:flex-start">
                        <div style="width:48px;height:48px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem;">📞</div>
                        <div>
                            <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--gray-500);margin-bottom:4px">Phone</div>
                            <a href="tel:<?php echo esc_attr( preg_replace('/\D/','',$phone) ); ?>" style="font-size:1.1rem; font-weight:600; color:var(--black)"><?php echo esc_html( $phone ); ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ( $email ) : ?>
                    <div style="display:flex; gap:1rem; align-items:flex-start">
                        <div style="width:48px;height:48px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem;">✉️</div>
                        <div>
                            <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--gray-500);margin-bottom:4px">Email</div>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>" style="font-size:1rem; color:var(--black)"><?php echo esc_html( $email ); ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div style="padding:var(--space-md); background:var(--off-white); border-radius:var(--radius); border-left:3px solid var(--gold)">
                        <p style="font-size:0.9rem; color:var(--gray-700); margin:0">Typical response time is within a few hours during business hours. For urgent matters, a call is always fastest.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn    = document.getElementById('cf-submit');
    const status = document.getElementById('cf-status');
    const btnTxt = document.getElementById('cf-btn-text');

    btn.disabled = true;
    btnTxt.textContent = 'Sending…';

    const data = new FormData(this);
    data.append('action', 'jarred_contact');
    data.append('nonce',  jarredAjax.nonce);

    try {
        const res  = await fetch(jarredAjax.url, { method: 'POST', body: data });
        const json = await res.json();

        status.style.display = 'block';
        if (json.success) {
            status.style.background = '#f0fdf4';
            status.style.color      = '#166534';
            status.style.border     = '1px solid #bbf7d0';
            status.textContent      = json.data.message;
            this.reset();
        } else {
            status.style.background = '#fef2f2';
            status.style.color      = '#991b1b';
            status.style.border     = '1px solid #fecaca';
            status.textContent      = json.data.message;
        }
    } catch {
        status.style.display    = 'block';
        status.style.background = '#fef2f2';
        status.style.color      = '#991b1b';
        status.textContent      = 'Something went wrong. Please try calling or emailing directly.';
    } finally {
        btn.disabled    = false;
        btnTxt.textContent = 'Send Message';
    }
});
</script>

<?php get_footer(); ?>
