<?php
/**
 * Template Name: Inherited Home Guide
 * Description: Landing page for The Kansas City Inherited Home Guide (lead magnet).
 */

$ihg_phone        = get_theme_mod( 'agent_phone', '816-719-0829' );
$ihg_email        = get_theme_mod( 'agent_email', 'jarred.donalson@kw.com' );
$ihg_office_phone = get_theme_mod( 'brokerage_phone', '816-452-4200' );
$ihg_brokerage    = 'Keller Williams Kansas City North';

/* FAQ content lives in one place so the page and the FAQ schema always match. */
$ihg_faqs = [
	[
		'q' => 'Can I sell an inherited house in Kansas City before probate is finished?',
		'a' => 'Usually not, if the home has to go through probate. The court first has to give someone, often called the personal representative or executor, the legal authority to sell. If the home was in a living trust or passed by a transfer-on-death (beneficiary) deed, it may be possible to sell without probate. A local probate attorney can tell you quickly which path applies to your family.',
	],
	[
		'q' => 'Is the process different on the Missouri and Kansas sides of the state line?',
		'a' => 'Yes. Missouri and Kansas both allow transfer-on-death deeds and both have probate courts, but the rules, dollar limits for simplified small-estate processes and timelines differ, and they can change. Work with a probate attorney licensed in the state where the home is located.',
	],
	[
		'q' => 'Do I have to pay capital gains tax when I sell an inherited home?',
		'a' => 'Often less than people expect. Inherited property commonly receives a "stepped-up" cost basis to its value at the date of death, which can greatly reduce capital gains tax when you sell. Every situation is different, so talk with a CPA before you sell.',
	],
	[
		'q' => 'Should I take a cash offer from a "we buy houses" company?',
		'a' => 'Some cash offers are fair, but many come in well below market value. Before you accept any offer, get a real market value for the home so you know exactly what you would be giving up in exchange for speed.',
	],
	[
		'q' => 'Do I need to clean out or fix up the house before selling it?',
		'a' => 'Not necessarily. You can sell an inherited home as-is, or make light updates buyers actually pay for, like paint, flooring, deep cleaning and small repairs. The right answer depends on the home, the market and how much time and money the family wants to put in.',
	],
	[
		'q' => 'What if my siblings and I disagree about what to do with the house?',
		'a' => 'That is common, and usually it is because people have different needs and timelines, not because anyone is being difficult. Agree on who makes the final call, get the same facts in front of everyone (market value, repair estimate and monthly carrying costs) and put decisions in writing. If the family is truly stuck, an attorney or mediator can help.',
	],
];

add_action( 'wp_head', function () use ( $ihg_faqs ) {
	$schema = [
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => array_map( function ( $f ) {
			return [
				'@type'          => 'Question',
				'name'           => $f['q'],
				'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $f['a'] ],
			];
		}, $ihg_faqs ),
	];
	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
	echo '<meta name="description" content="A free, step-by-step guide for Kansas City families who inherited a home: the first 30 days, probate basics in Missouri and Kansas, your four options and a printable checklist.">' . "\n";
}, 5 );

get_header();
?>

<style>
/* ---------- Inherited Home Guide landing page (scoped: .ihg) ---------- */
.ihg { --gold-ink: #866115; }
.ihg-hero { background: var(--black); padding: 150px 0 var(--space-xl); color: var(--white); }
.ihg-hero__grid { display: grid; grid-template-columns: 1.15fr 1fr; gap: var(--space-lg); align-items: start; }
.ihg-hero h1 { color: var(--white); margin: var(--space-sm) 0; }
.ihg-hero h1 em { font-style: normal; color: var(--gold); }
.ihg-hero .lead { color: rgba(255,255,255,0.75); max-width: 560px; }
.ihg-hero__points { margin-top: var(--space-md); display: grid; gap: 12px; }
.ihg-hero__points li { display: flex; gap: 12px; align-items: flex-start; color: rgba(255,255,255,0.85); font-size: 0.98rem; }
.ihg-hero__points li::before { content: ""; flex-shrink: 0; width: 8px; height: 8px; margin-top: 0.55em; background: var(--gold); transform: rotate(45deg); }

.ihg-card { background: var(--white); color: var(--gray-900); border-radius: var(--radius); padding: var(--space-md); border-top: 4px solid var(--gold); box-shadow: 0 20px 60px rgba(0,0,0,0.35); }
.ihg-card h2 { font-size: clamp(1.6rem, 3vw, 2.1rem); margin-bottom: 6px; }
.ihg-card__sub { color: var(--gray-700); font-size: 0.92rem; margin-bottom: var(--space-sm); }
.ihg-card .form-grid { grid-template-columns: 1fr; gap: 14px; }
.ihg-card .form-label { color: var(--gray-700); }
.ihg-fine { font-size: 0.78rem; color: #696969; margin-top: 12px; line-height: 1.5; }
.ihg-hp { position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; }
.ihg-status { display: none; margin-top: 14px; padding: 14px 16px; border-radius: var(--radius); font-size: 0.92rem; }
.ihg-status--ok { display: block; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
.ihg-status--err { display: block; background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
.ihg-success { display: none; text-align: center; padding: var(--space-sm) 0; }
.ihg-success.is-visible { display: block; }
.ihg-success p { color: var(--gray-700); margin: 10px 0 var(--space-sm); }

.ihg-eyebrow-ink { color: var(--gold-ink); }
.ihg-section-head { max-width: 720px; margin-bottom: var(--space-md); }
.ihg-section-head h2 { margin-bottom: var(--space-sm); }
.ihg-section-head p { color: var(--gray-700); }

.ihg-steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1px; background: var(--gray-300); border: 1px solid var(--gray-300); }
.ihg-step { background: var(--white); padding: 28px 24px; }
.ihg-step__num { font-family: var(--font-display); font-size: 2.2rem; color: var(--gold-ink); line-height: 1; }
.ihg-step h3 { font-size: 1.35rem; margin: 10px 0 8px; }
.ihg-step p { font-size: 0.93rem; color: var(--gray-700); margin: 0; }
.ihg-step--cta { background: var(--black); display: flex; flex-direction: column; justify-content: space-between; gap: var(--space-sm); }
.ihg-step--cta h3 { color: var(--white); margin-top: 0; }
.ihg-step--cta p { color: rgba(255,255,255,0.7); }

.ihg-two { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md); }
.ihg-list-box { background: var(--white); padding: var(--space-md); border-radius: var(--radius); border-left: 3px solid var(--gold); }
.ihg-list-box--hold { border-left-color: var(--gray-500); }
.ihg-list-box h3 { font-size: 1.5rem; margin-bottom: var(--space-sm); }
.ihg-list-box li { position: relative; padding-left: 22px; margin-bottom: 12px; color: var(--gray-700); font-size: 0.95rem; }
.ihg-list-box li::before { content: ""; position: absolute; left: 0; top: 0.6em; width: 8px; height: 2px; background: var(--gold); }
.ihg-list-box--hold li::before { background: var(--gray-500); }
.ihg-list-box strong { color: var(--gray-900); }

.ihg-options { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-sm); }
.ihg-option { border: 1px solid var(--gray-300); border-radius: var(--radius); padding: 28px; }
.ihg-option__num { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.15em; color: var(--gold-ink); }
.ihg-option h3 { font-size: 1.45rem; margin: 6px 0 14px; }
.ihg-option dt { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #696969; margin-top: 10px; }
.ihg-option dd { font-size: 0.93rem; color: var(--gray-700); margin: 4px 0 0; }
.ihg-callout { margin-top: var(--space-md); background: var(--off-white); padding: var(--space-md); border-radius: var(--radius); }
.ihg-callout p { margin: 0; color: var(--gray-700); }

.ihg-story { display: grid; grid-template-columns: 1fr 1.3fr; gap: var(--space-lg); align-items: center; }
.ihg-story blockquote { font-family: var(--font-display); font-size: clamp(1.6rem, 3vw, 2.3rem); line-height: 1.3; color: var(--white); border-left: 3px solid var(--gold); padding-left: var(--space-md); }
.ihg-story cite { display: block; margin-top: var(--space-sm); font-family: var(--font-body); font-style: normal; font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--gold); }
.ihg-story p { color: rgba(255,255,255,0.75); }

.ihg-help { display: grid; grid-template-columns: 0.8fr 1.2fr; gap: var(--space-lg); align-items: center; }
.ihg-help img { width: 100%; border-radius: var(--radius); aspect-ratio: 4 / 5; object-fit: cover; }
.ihg-help ul { margin: var(--space-sm) 0 var(--space-md); }
.ihg-help li { position: relative; padding-left: 26px; margin-bottom: 10px; color: var(--gray-700); }
.ihg-help li::before { content: ""; position: absolute; left: 0; top: 0.5em; width: 10px; height: 6px; border-left: 2px solid var(--gold-ink); border-bottom: 2px solid var(--gold-ink); transform: rotate(-45deg); }
.ihg-contact-block { display: flex; flex-wrap: wrap; gap: var(--space-md); padding-top: var(--space-sm); border-top: 1px solid var(--gray-300); font-size: 0.95rem; }
.ihg-contact-block strong { display: block; font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase; color: #696969; margin-bottom: 2px; }
.ihg-contact-block a { color: var(--black); font-weight: 600; }

.ihg-faq { max-width: 820px; }
.ihg-faq details { border-bottom: 1px solid var(--gray-300); }
.ihg-faq summary { cursor: pointer; list-style: none; padding: 22px 40px 22px 0; position: relative; font-family: var(--font-display); font-size: 1.35rem; font-weight: 600; color: var(--black); }
.ihg-faq summary::-webkit-details-marker { display: none; }
.ihg-faq summary::after { content: "+"; position: absolute; right: 4px; top: 18px; font-family: var(--font-body); font-size: 1.5rem; color: var(--gold-ink); }
.ihg-faq details[open] summary::after { content: "\2212"; }
.ihg-faq details p { color: var(--gray-700); padding-bottom: 22px; max-width: 720px; }

.ihg-final { text-align: center; }
.ihg-final h2 { color: var(--white); }
.ihg-final p { color: rgba(255,255,255,0.75); max-width: 560px; margin: var(--space-sm) auto var(--space-md); }
.ihg-final .btn + .btn { margin-left: 12px; }
.ihg-disclaimer { font-size: 0.8rem; color: #696969; max-width: 820px; margin: 0 auto; text-align: center; }

@media (max-width: 900px) {
	.ihg-hero { padding-top: 120px; }
	.ihg-hero__grid, .ihg-two, .ihg-story, .ihg-help { grid-template-columns: 1fr; }
	.ihg-options { grid-template-columns: 1fr; }
	.ihg-help img { max-width: 360px; }
	.ihg-final .btn { display: flex; justify-content: center; margin: 0 0 12px !important; }
}
</style>

<div class="ihg">

<!-- ============ HERO + FORM ============ -->
<section class="ihg-hero">
	<div class="container ihg-hero__grid">
		<div>
			<span class="eyebrow">A Free Guide for Kansas City Families</span>
			<h1>You Inherited a Home. <em>Here's Your Plan.</em></h1>
			<p class="lead">The Kansas City Inherited Home Guide is a calm, step-by-step plan for what to do with a house you've inherited, on either side of the state line. You don't have to figure it all out this week.</p>
			<ul class="ihg-hero__points">
				<li>What to do in the first 30 days, and what can wait</li>
				<li>How the house legally passes to you in Missouri and Kansas</li>
				<li>Your four real options: keep, rent, sell as-is or update and sell</li>
				<li>How to make decisions with siblings and co-heirs</li>
				<li>A simple timeline and a printable checklist</li>
			</ul>
		</div>

		<div class="ihg-card" id="get-the-guide">
			<div id="ihg-form-wrap">
				<h2>Get the free guide</h2>
				<p class="ihg-card__sub">11 pages. Instant download, plus a copy sent to your inbox.</p>

				<form id="ihg-form" novalidate>
					<div class="form-grid">
						<div class="form-group">
							<label class="form-label" for="ihg-name">First name *</label>
							<input class="form-input" type="text" id="ihg-name" name="name" required autocomplete="given-name">
						</div>
						<div class="form-group">
							<label class="form-label" for="ihg-email">Email *</label>
							<input class="form-input" type="email" id="ihg-email" name="email" required autocomplete="email">
						</div>
						<div class="form-group">
							<label class="form-label" for="ihg-phone">Phone (optional)</label>
							<input class="form-input" type="tel" id="ihg-phone" name="phone" autocomplete="tel">
						</div>
						<div class="form-group">
							<label class="form-label" for="ihg-stage">Where are you right now?</label>
							<select class="form-select form-input" id="ihg-stage" name="stage">
								<option value="Just getting started">Just getting started</option>
								<option value="Going through probate">Going through probate</option>
								<option value="Deciding what to do with the house">Deciding what to do with the house</option>
								<option value="Ready to talk about selling">Ready to talk about selling</option>
								<option value="Helping a family member">Helping a family member</option>
							</select>
						</div>
						<div class="ihg-hp" aria-hidden="true">
							<label for="ihg-website">Leave this field empty</label>
							<input type="text" id="ihg-website" name="website" tabindex="-1" autocomplete="off">
						</div>
						<button type="submit" class="btn btn--primary" id="ihg-submit" style="width:100%; justify-content:center">
							<span id="ihg-btn-text">Send Me the Guide</span>
						</button>
					</div>
					<div id="ihg-status" class="ihg-status" role="status" aria-live="polite"></div>
					<p class="ihg-fine">By requesting the guide, you agree to receive occasional emails from Jarred Donalson with Reside in Kansas City. Unsubscribe anytime. No spam, no pressure.</p>
				</form>
				<noscript><p class="ihg-fine">Prefer not to use the form? <a href="<?php echo esc_url( jarred_re_inherited_guide_url() ); ?>">Download the guide directly</a>.</p></noscript>
			</div>

			<div class="ihg-success" id="ihg-success" tabindex="-1">
				<span class="eyebrow ihg-eyebrow-ink">It's on the way</span>
				<h2>Your guide is ready</h2>
				<p>I also sent a copy to your inbox. Take your time with it. When you're ready to talk through your situation, I'm here.</p>
				<a class="btn btn--primary" id="ihg-download" href="<?php echo esc_url( jarred_re_inherited_guide_url() ); ?>" target="_blank" rel="noopener">Download the Guide (PDF)</a>
			</div>
		</div>
	</div>
</section>

<!-- ============ WHAT'S INSIDE ============ -->
<section class="section">
	<div class="container">
		<div class="ihg-section-head">
			<span class="eyebrow ihg-eyebrow-ink">What's Inside</span>
			<span class="gold-rule"></span>
			<h2>Seven steps, one at a time</h2>
			<p>When someone you love passes away and leaves a house behind, the paperwork and the memories arrive at the same time. The guide breaks the process into seven steps so you always know what comes next.</p>
		</div>
		<div class="ihg-steps">
			<div class="ihg-step"><div class="ihg-step__num">01</div><h3>The first 30 days</h3><p>Protect the house and get organized before making any big decisions.</p></div>
			<div class="ihg-step"><div class="ihg-step__num">02</div><h3>How the house passes to you</h3><p>Trusts, transfer-on-death deeds, wills and probate in Missouri and Kansas.</p></div>
			<div class="ihg-step"><div class="ihg-step__num">03</div><h3>Know your options</h3><p>Keep it, rent it, sell it as-is or make light updates and sell.</p></div>
			<div class="ihg-step"><div class="ihg-step__num">04</div><h3>Clearing out the house</h3><p>A simple order to follow, from important documents to the final haul-away.</p></div>
			<div class="ihg-step"><div class="ihg-step__num">05</div><h3>Siblings and co-heirs</h3><p>How families make a fair decision together, even when they disagree.</p></div>
			<div class="ihg-step"><div class="ihg-step__num">06</div><h3>Taxes and costs</h3><p>Step-up in basis, holding costs and the questions to bring to your CPA.</p></div>
			<div class="ihg-step"><div class="ihg-step__num">07</div><h3>Timeline and checklist</h3><p>A realistic picture of how it usually goes, plus a page you can print.</p></div>
			<div class="ihg-step ihg-step--cta"><div><h3>All seven in one guide</h3><p>Free, 11 pages, yours to print and share with family.</p></div><a class="btn btn--primary" href="#get-the-guide">Get the Guide</a></div>
		</div>
	</div>
</section>

<!-- ============ FIRST 30 DAYS (answer-first content) ============ -->
<section class="section section--offwhite">
	<div class="container">
		<div class="ihg-section-head">
			<span class="eyebrow ihg-eyebrow-ink">Start Here</span>
			<span class="gold-rule"></span>
			<h2>What to do first after inheriting a house in Kansas City</h2>
			<p>The first month is about protecting the house and getting organized, not making big decisions. Making a plan early is the single most important thing you can do to make this process less stressful.</p>
		</div>
		<div class="ihg-two">
			<div class="ihg-list-box">
				<h3>Do these first</h3>
				<ul>
					<li><strong>Secure the home.</strong> Lock all doors and windows, and think about changing the locks if you aren't sure who has keys.</li>
					<li><strong>Keep the insurance active.</strong> Let the insurance company know the owner has passed, and ask about vacancy coverage.</li>
					<li><strong>Keep the utilities on.</strong> Kansas City winters are hard on empty houses. Power, water and gas prevent freezing and mold.</li>
					<li><strong>Forward the mail.</strong> Bills, tax notices and mortgage statements tell you what's owed.</li>
					<li><strong>Find the paperwork.</strong> The will, trust, deed, mortgage statements, tax bills and insurance policies.</li>
					<li><strong>Check on the property.</strong> Walk through at least once a week, or ask a trusted neighbor.</li>
				</ul>
			</div>
			<div class="ihg-list-box ihg-list-box--hold">
				<h3>Hold off on these</h3>
				<ul>
					<li>Don't sell, give away or throw out valuables before you know who has the legal right to decide.</li>
					<li>Don't sign anything to sell the house until you know who has the authority to sell it.</li>
					<li>Don't start expensive repairs or renovations yet.</li>
					<li>Don't accept the first cash offer that shows up in the mailbox.</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- ============ FOUR OPTIONS ============ -->
<section class="section">
	<div class="container">
		<div class="ihg-section-head">
			<span class="eyebrow ihg-eyebrow-ink">Your Options</span>
			<span class="gold-rule"></span>
			<h2>Keep it, rent it or sell it?</h2>
			<p>There's no single right answer. The best choice depends on your finances, your family, the condition of the house and how much time and energy you have.</p>
		</div>
		<div class="ihg-options">
			<div class="ihg-option">
				<span class="ihg-option__num">01</span>
				<h3>Keep the home and live in it</h3>
				<dl><dt>Good fit if</dt><dd>You or a family member wants to live there and can take on the payments, taxes and upkeep.</dd>
				<dt>Think about</dt><dd>Any mortgage still owed, buying out co-heirs and the cost of updates.</dd></dl>
			</div>
			<div class="ihg-option">
				<span class="ihg-option__num">02</span>
				<h3>Keep it as a rental</h3>
				<dl><dt>Good fit if</dt><dd>The home is in solid shape, in a good rental area, and you're comfortable being a landlord or hiring a manager.</dd>
				<dt>Think about</dt><dd>Repairs before renting, insurance changes, management costs and agreement among heirs.</dd></dl>
			</div>
			<div class="ihg-option">
				<span class="ihg-option__num">03</span>
				<h3>Sell it as-is</h3>
				<dl><dt>Good fit if</dt><dd>You live out of town, the house needs a lot of work, or the family wants a simpler, faster process.</dd>
				<dt>Think about</dt><dd>You'll usually trade some price for speed. An as-is sale on the open market often brings more than a quick cash offer.</dd></dl>
			</div>
			<div class="ihg-option">
				<span class="ihg-option__num">04</span>
				<h3>Make light updates, then sell</h3>
				<dl><dt>Good fit if</dt><dd>The house is basically sound but dated, and you have some time and money to invest.</dd>
				<dt>Think about</dt><dd>Focus on what buyers pay for: paint, flooring, deep cleaning, landscaping and small repairs. Skip big remodels.</dd></dl>
			</div>
		</div>
		<div class="ihg-callout">
			<p><strong>A word about "we buy houses" offers.</strong> After a death, families often get letters and calls from cash buyers. Some are fair, but many are well below market value. Before you accept any offer, get a real market value for the home so you know what you'd be giving up.</p>
		</div>
	</div>
</section>

<!-- ============ STORY ============ -->
<section class="section section--dark">
	<div class="container ihg-story">
		<blockquote>
			Knowing the process up front saves families time, money and a lot of frustration.
			<cite>Jarred Donalson, REALTOR&reg;</cite>
		</blockquote>
		<div>
			<span class="eyebrow">A Real Kansas City Story</span>
			<h2 style="margin:var(--space-xs) 0 var(--space-sm)">Two sisters, one canceled listing</h2>
			<p>Two sisters inherited their parents' home after their mother passed away. The house was dated and needed some mild repairs. They first listed it with an agent who didn't realize the home had to go through probate before it could be sold. No buyer could close, so the listing was canceled.</p>
			<p>After probate was complete, they called me. The market favored sellers, so we made only the repairs needed for the home to qualify for government-backed loans like FHA and VA. Then we marketed it well, and it sold for over asking price within a couple of days.</p>
		</div>
	</div>
</section>

<!-- ============ HOW I HELP ============ -->
<section class="section">
	<div class="container ihg-help">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/agent-photo.jpg" alt="Jarred Donalson, Kansas City real estate agent with Reside in Kansas City and Keller Williams Kansas City North" loading="lazy">
		<div>
			<span class="eyebrow ihg-eyebrow-ink">How I Can Help</span>
			<span class="gold-rule"></span>
			<h2>You don't have to do this alone</h2>
			<p style="color:var(--gray-700); margin-top:var(--space-sm)">I'm Jarred Donalson with Reside in Kansas City. I've helped many Kansas City families sell an inherited home, and I know how heavy it can feel. Before real estate, I worked as a therapist, so I understand that this is about more than a house. When a home carries this many memories, the conversations matter as much as the paperwork.</p>
			<p style="color:var(--gray-700)">Here's what I can do for you, with no pressure and no obligation:</p>
			<ul>
				<li>Give you an honest market value, so you know your real options</li>
				<li>Help you compare selling as-is with making light updates</li>
				<li>Connect you with trusted local partners, including estate sale, cleanout and repair pros</li>
				<li>Coordinate the sale, even if you live out of town</li>
				<li>Keep everyone in the family informed along the way</li>
			</ul>
			<div class="ihg-contact-block">
				<div><strong>Jarred Donalson, REALTOR&reg;</strong>Reside in Kansas City<br><?php echo esc_html( $ihg_brokerage ); ?></div>
				<div><strong>Cell</strong><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $ihg_phone ) ); ?>"><?php echo esc_html( $ihg_phone ); ?></a></div>
				<div><strong>Office</strong><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $ihg_office_phone ) ); ?>"><?php echo esc_html( $ihg_office_phone ); ?></a></div>
				<div><strong>Email</strong><a href="mailto:<?php echo esc_attr( $ihg_email ); ?>"><?php echo esc_html( $ihg_email ); ?></a></div>
			</div>
		</div>
	</div>
</section>

<!-- ============ FAQ ============ -->
<section class="section section--offwhite">
	<div class="container">
		<div class="ihg-section-head">
			<span class="eyebrow ihg-eyebrow-ink">Common Questions</span>
			<span class="gold-rule"></span>
			<h2>Inherited home questions Kansas City families ask</h2>
		</div>
		<div class="ihg-faq">
			<?php foreach ( $ihg_faqs as $i => $f ) : ?>
				<details<?php echo 0 === $i ? ' open' : ''; ?>>
					<summary><?php echo esc_html( $f['q'] ); ?></summary>
					<p><?php echo esc_html( $f['a'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="section section--dark">
	<div class="container ihg-final">
		<span class="eyebrow">Whenever You're Ready</span>
		<h2>Start with a simple plan</h2>
		<p>Download the guide and read it at your own pace. If you'd rather talk it through, call or text me. We'll start with a simple plan.</p>
		<a class="btn btn--primary" href="#get-the-guide">Get the Free Guide</a>
		<a class="btn btn--outline" href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $ihg_phone ) ); ?>">Call <?php echo esc_html( $ihg_phone ); ?></a>
	</div>
</section>

<section class="section--sm" style="padding:var(--space-md) 0">
	<div class="container">
		<p class="ihg-disclaimer">This page and the guide are for general information only and are not legal, tax or financial advice. Every estate is different, so please talk with a probate attorney and a CPA about your specific situation. Jarred Donalson, REALTOR&reg;, Reside in Kansas City, <?php echo esc_html( $ihg_brokerage ); ?>, 310 NW Englewood Rd, Kansas City, MO 64118, office <?php echo esc_html( $ihg_office_phone ); ?>. Licensed in Missouri and Kansas. Each Office Independently Owned &amp; Operated.</p>
	</div>
</section>

</div><!-- /.ihg -->

<script>
(function () {
	var form = document.getElementById('ihg-form');
	if (!form) return;
	form.addEventListener('submit', async function (e) {
		e.preventDefault();
		var btn = document.getElementById('ihg-submit');
		var btnTxt = document.getElementById('ihg-btn-text');
		var status = document.getElementById('ihg-status');
		status.className = 'ihg-status';
		status.textContent = '';

		if (!form.name.value.trim() || !/^\S+@\S+\.\S+$/.test(form.email.value.trim())) {
			status.className = 'ihg-status ihg-status--err';
			status.textContent = 'Please add your first name and a valid email address.';
			return;
		}

		btn.disabled = true;
		btnTxt.textContent = 'Sending…';

		var data = new FormData(form);
		data.append('action', 'jarred_inherited_guide');
		data.append('nonce', (window.jarredAjax && jarredAjax.nonce) || '');

		try {
			var res = await fetch(window.jarredAjax ? jarredAjax.url : '/wp-admin/admin-ajax.php', { method: 'POST', body: data });
			var json = await res.json();
			if (json.success) {
				if (json.data && json.data.url) document.getElementById('ihg-download').href = json.data.url;
				document.getElementById('ihg-form-wrap').style.display = 'none';
				var ok = document.getElementById('ihg-success');
				ok.classList.add('is-visible');
				ok.focus();
				if (typeof window.gtag === 'function') window.gtag('event', 'generate_lead', { lead_source: 'inherited_home_guide' });
			} else {
				status.className = 'ihg-status ihg-status--err';
				status.textContent = (json.data && json.data.message) || 'Something went wrong. Please try again.';
			}
		} catch (err) {
			status.className = 'ihg-status ihg-status--err';
			status.textContent = 'Something went wrong. Please call or text <?php echo esc_js( $ihg_phone ); ?> and I will send the guide directly.';
		} finally {
			btn.disabled = false;
			btnTxt.textContent = 'Send Me the Guide';
		}
	});
})();
</script>

<?php get_footer(); ?>
