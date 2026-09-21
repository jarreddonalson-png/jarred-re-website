<?php
/**
 * Template Name: Seller Score
 * Description: Full-width KC Home Readiness Score quiz — no WP header/footer
 */
// Bypass WordPress output completely
while ( ob_get_level() ) { ob_end_clean(); }
header( 'Content-Type: text/html; charset=UTF-8' );
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<title>KC Home Readiness Score | Reside in KC</title>
<meta name="description" content="Find out what grade your Kansas City home would get today. 18 honest questions, an A–F readiness score, and a specific action plan — free from Jarred Donalson, REALTOR®.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@400;500;600&display=swap">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --gold:#b8912a;
  --gold-d:#8a6b1a;
  --gold-l:#fdf7e8;
  --gold-xl:#fefcf4;
  --amber:#7a5c10;
  --amber-l:#fdf3d8;
  --text-1:#111111;
  --text-2:#4a4640;
  --text-3:#8a8278;
  --border:#e0dbd0;
  --surface:#ffffff;
  --ground:#f8f6f2;
  --radius:14px;
  --radius-sm:8px;
  --shadow:0 4px 24px rgba(0,0,0,.09);
  --shadow-sm:0 2px 8px rgba(0,0,0,.06);
  --serif:'Cormorant Garamond',Georgia,serif;
  --sans:'Inter',system-ui,sans-serif;
}
@media(prefers-color-scheme:dark){:root:not([data-theme="light"]){
  --gold:#d4a84a;--gold-d:#e8c870;--gold-l:#1e1a08;--gold-xl:#141208;
  --amber:#c49038;--amber-l:#1a1508;
  --text-1:#f0ece0;--text-2:#a89e8a;--text-3:#6a6050;
  --border:#2e2a1e;--surface:#181610;--ground:#0f0e09;
  --shadow:0 4px 24px rgba(0,0,0,.35);--shadow-sm:0 2px 8px rgba(0,0,0,.25);
}}
:root[data-theme="dark"]{
  --gold:#d4a84a;--gold-d:#e8c870;--gold-l:#1e1a08;--gold-xl:#141208;
  --amber:#c49038;--amber-l:#1a1508;
  --text-1:#f0ece0;--text-2:#a89e8a;--text-3:#6a6050;
  --border:#2e2a1e;--surface:#181610;--ground:#0f0e09;
  --shadow:0 4px 24px rgba(0,0,0,.35);--shadow-sm:0 2px 8px rgba(0,0,0,.25);
}
body{font-family:var(--sans);background:var(--ground);color:var(--text-1);font-size:16px;line-height:1.6;-webkit-font-smoothing:antialiased}
h1,h2,h3,h4{font-family:var(--serif);line-height:1.25;color:var(--text-1)}
a{color:var(--gold);text-decoration:none}
a:hover{text-decoration:underline}
button{cursor:pointer;font-family:var(--sans)}

.page-wrap{max-width:760px;margin:0 auto;padding:0 16px 60px}

/* HERO */
.hero{background:linear-gradient(135deg,#0a0a08 0%,#181610 55%,#221e10 100%);padding:52px 24px 48px;text-align:center;color:#fff;border-bottom:3px solid var(--gold)}
.hero-eyebrow{font-family:var(--sans);font-size:11px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.65);margin-bottom:16px}
.hero h1{font-family:var(--serif);font-size:clamp(2rem,5.5vw,3.2rem);font-weight:700;color:#fff;text-wrap:balance;margin-bottom:16px}
.hero-sub{font-size:1.05rem;color:rgba(255,255,255,.82);max-width:540px;margin:0 auto 28px;text-wrap:balance}
.data-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.22);border-radius:99px;padding:8px 18px;font-size:.82rem;color:rgba(255,255,255,.88);font-weight:500}

/* QUIZ CARD */
.quiz-card{background:var(--surface);border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;margin-top:-1px}
.screen{display:none}.screen.active{display:block}

/* INTRO */
.intro-body{padding:40px 36px 44px;text-align:center}
.intro-body h2{font-size:1.9rem;margin-bottom:14px;text-wrap:balance}
.intro-body p{color:var(--text-2);max-width:500px;margin:0 auto 28px;font-size:.97rem}
.intro-pills{display:flex;flex-wrap:wrap;justify-content:center;gap:10px;margin-bottom:32px}
.intro-pill{background:var(--gold-l);border:1px solid var(--border);border-radius:99px;padding:6px 16px;font-size:.82rem;font-weight:500;color:var(--gold)}
.btn-primary{display:inline-flex;align-items:center;gap:8px;background:var(--gold);color:#fff;border:none;border-radius:99px;padding:16px 36px;font-size:1rem;font-weight:600;letter-spacing:.01em;transition:background .18s,transform .1s}
.btn-primary:hover{background:var(--gold-d);transform:translateY(-1px)}
.intro-fine{margin-top:18px;font-size:.78rem;color:var(--text-3)}

/* PROGRESS */
.progress-bar-wrap{height:4px;background:var(--border)}
.progress-bar-fill{height:100%;background:var(--gold);transition:width .4s ease}

/* QUIZ HEADER */
.quiz-header{padding:20px 28px 0;display:flex;align-items:center;justify-content:space-between}
.quiz-category{font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);background:var(--gold-l);border-radius:99px;padding:4px 14px}
.quiz-counter{font-size:.8rem;color:var(--text-3);font-weight:500}

/* QUESTION */
.question-body{padding:24px 28px 28px}
.q-text{font-family:var(--serif);font-size:1.4rem;font-weight:600;margin-bottom:8px;line-height:1.35;text-wrap:balance}
.q-sub{font-size:.85rem;color:var(--amber);background:var(--amber-l);border-left:3px solid var(--amber);padding:8px 12px;border-radius:0 6px 6px 0;margin-bottom:20px;font-weight:500}
.options{display:flex;flex-direction:column;gap:10px;margin-bottom:20px}
.option{display:flex;align-items:flex-start;gap:12px;background:var(--ground);border:2px solid var(--border);border-radius:var(--radius-sm);padding:14px 16px;text-align:left;font-size:.93rem;color:var(--text-1);transition:border-color .15s,background .15s;line-height:1.4}
.option:hover{border-color:var(--gold);background:var(--gold-xl)}
.option.selected{border-color:var(--gold);background:var(--gold-l);color:var(--gold-d)}
.opt-check{width:20px;height:20px;min-width:20px;border-radius:50%;border:2px solid var(--border);background:var(--surface);display:flex;align-items:center;justify-content:center;margin-top:1px;transition:border-color .15s,background .15s}
.option.selected .opt-check{background:var(--gold);border-color:var(--gold)}
.opt-check-inner{width:8px;height:8px;border-radius:50%;background:#fff;display:none}
.option.selected .opt-check-inner{display:block}
.opt-check.multi{border-radius:4px}
.option.selected .opt-check.multi{background:var(--gold);border-color:var(--gold)}
.opt-check.multi .opt-check-inner{display:block;width:10px;height:7px;background:none;border:none;border-radius:0;position:relative}
.opt-check.multi .opt-check-inner::before{content:'';position:absolute;bottom:1px;left:0;width:10px;height:7px;border-left:2px solid #fff;border-bottom:2px solid #fff;transform:rotate(-45deg) translate(2px,-2px);display:none}
.option.selected .opt-check.multi .opt-check-inner::before{display:block}
.why-box{background:var(--gold-l);border-radius:var(--radius-sm);padding:12px 16px;font-size:.82rem;color:var(--text-2);line-height:1.5;margin-bottom:24px;border:1px solid var(--border)}
.why-box strong{color:var(--gold);font-weight:600}

/* NAV */
.quiz-nav{display:flex;justify-content:space-between;align-items:center;padding:0 28px 28px;gap:12px}
.btn-back{background:none;border:1.5px solid var(--border);border-radius:99px;padding:11px 22px;font-size:.9rem;color:var(--text-2);font-weight:500;transition:border-color .15s,color .15s}
.btn-back:hover{border-color:var(--gold);color:var(--gold)}
.btn-next{background:var(--gold);border:none;border-radius:99px;padding:11px 28px;font-size:.9rem;font-weight:600;color:#fff;transition:background .15s,transform .1s;margin-left:auto}
.btn-next:hover{background:var(--gold-d);transform:translateY(-1px)}
.btn-next:disabled{background:var(--border);color:var(--text-3);cursor:not-allowed;transform:none}
.btn-next-multi{background:var(--gold);border:none;border-radius:99px;padding:11px 28px;font-size:.9rem;font-weight:600;color:#fff;transition:background .15s;margin-left:auto}
.btn-next-multi:hover{background:var(--gold-d)}

/* RESULTS */
.results-top{padding:36px 28px 28px;display:flex;align-items:center;gap:28px;flex-wrap:wrap;border-bottom:1px solid var(--border)}
.grade-circle{width:100px;height:100px;min-width:100px;border-radius:50%;background:#111;display:flex;flex-direction:column;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(0,0,0,.18)}
.grade-letter{font-family:var(--serif);font-size:2.8rem;font-weight:700;color:#fff;line-height:1}
.grade-score-label{font-size:.65rem;font-weight:600;color:rgba(255,255,255,.75);letter-spacing:.06em;text-transform:uppercase;margin-top:2px}
.results-headline-block{flex:1;min-width:200px}
.results-headline{font-family:var(--serif);font-size:1.3rem;font-weight:600;margin-bottom:8px;text-wrap:balance}
.results-copy{font-size:.88rem;color:var(--text-2);line-height:1.6}

.cat-bars{padding:28px;border-bottom:1px solid var(--border)}
.cat-bars h3{font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-3);margin-bottom:20px}
.cat-bar-row{margin-bottom:18px}
.cat-bar-label{display:flex;justify-content:space-between;font-size:.85rem;font-weight:500;color:var(--text-1);margin-bottom:6px}
.cat-bar-pct{color:var(--text-3);font-size:.8rem}
.cat-bar-track{height:8px;background:var(--border);border-radius:99px;overflow:hidden}
.cat-bar-fill{height:100%;border-radius:99px;background:var(--gold);width:0;transition:width 1s cubic-bezier(.25,.8,.25,1) .2s}

.timeline-section{padding:28px;border-bottom:1px solid var(--border)}
.timeline-section h3{font-size:1rem;font-weight:600;font-family:var(--serif);margin-bottom:14px}
.timeline-pills{display:flex;flex-wrap:wrap;gap:10px}
.timeline-pill{border:1.5px solid var(--border);border-radius:99px;padding:9px 18px;font-size:.85rem;font-weight:500;background:var(--surface);color:var(--text-2);transition:border-color .15s,background .15s,color .15s}
.timeline-pill:hover{border-color:var(--gold);color:var(--gold)}
.timeline-pill.active{border-color:var(--gold);background:var(--gold-l);color:var(--gold-d);font-weight:600}

.delivery-section{padding:28px;border-bottom:1px solid var(--border)}
.delivery-section h3{font-size:1rem;font-weight:600;font-family:var(--serif);margin-bottom:6px}
.delivery-section>p{font-size:.87rem;color:var(--text-2);margin-bottom:18px}
.delivery-options{display:flex;flex-direction:column;gap:12px}
.delivery-opt{border:2px solid var(--border);border-radius:var(--radius-sm);padding:16px;background:var(--ground);text-align:left;transition:border-color .15s,background .15s}
.delivery-opt:hover{border-color:var(--gold)}
.delivery-opt.selected{border-color:var(--gold);background:var(--gold-l)}
.delivery-opt-name{font-weight:600;font-size:.95rem;display:flex;align-items:center;gap:8px;margin-bottom:4px}
.delivery-tag{font-size:.7rem;font-weight:600;letter-spacing:.05em;text-transform:uppercase;background:var(--gold);color:#fff;border-radius:99px;padding:2px 8px}
.delivery-tag.amber{background:var(--amber)}
.delivery-opt-desc{font-size:.83rem;color:var(--text-2)}

.gate-section{padding:28px}
.gate-section h3{font-size:1rem;font-weight:600;font-family:var(--serif);margin-bottom:14px}
.gate-form{display:flex;flex-direction:column;gap:12px}
.gate-row{display:flex;gap:12px;flex-wrap:wrap}
.gate-field{display:flex;flex-direction:column;gap:5px;flex:1;min-width:180px}
.gate-field label{font-size:.78rem;font-weight:600;color:var(--text-2);letter-spacing:.04em}
.gate-field input{border:1.5px solid var(--border);border-radius:var(--radius-sm);padding:11px 14px;font-size:.93rem;font-family:var(--sans);background:var(--surface);color:var(--text-1);transition:border-color .15s;outline:none;width:100%}
.gate-field input:focus{border-color:var(--gold)}
.gate-field input.error{border-color:#e05a4a}
.btn-gate{background:var(--gold);border:none;border-radius:99px;padding:16px;font-size:1rem;font-weight:700;color:#fff;width:100%;transition:background .15s,transform .1s;letter-spacing:.01em}
.btn-gate:hover{background:var(--gold-d);transform:translateY(-1px)}
.gate-consent{font-size:.75rem;color:var(--text-3);line-height:1.5;text-align:center}
.form-error{color:#c0392b;font-size:.82rem;font-weight:500;display:none}

.confirm-body{padding:52px 32px;text-align:center}
.confirm-icon{width:64px;height:64px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;font-size:1.8rem}
.confirm-body h2{font-size:1.5rem;margin-bottom:12px;text-wrap:balance}
.confirm-body p{color:var(--text-2);font-size:.95rem;max-width:460px;margin:0 auto 28px}
.confirm-contact{display:flex;flex-wrap:wrap;justify-content:center;gap:16px;margin-top:8px}
.confirm-contact a{display:inline-flex;align-items:center;gap:8px;background:var(--gold-l);border:1px solid var(--border);border-radius:99px;padding:10px 20px;font-size:.88rem;font-weight:600;color:var(--gold)}

/* BELOW CARD */
.below-card{padding:48px 0 0}
.whats-next{margin-bottom:48px}
.section-eyebrow{font-size:.72rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:10px}
.section-heading{font-size:1.5rem;font-weight:700;margin-bottom:8px;text-wrap:balance}
.section-sub{font-size:.92rem;color:var(--text-2);margin-bottom:28px}
.next-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px}
.next-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:24px 20px;box-shadow:var(--shadow-sm)}
.next-card-icon{font-size:1.8rem;margin-bottom:12px}
.next-card h4{font-size:1rem;font-weight:600;margin-bottom:6px}
.next-card p{font-size:.83rem;color:var(--text-2);margin-bottom:12px}
.next-card a{font-size:.82rem;font-weight:600;color:var(--gold)}

.faq-section{margin-bottom:48px}
.faq-item{border-top:1px solid var(--border);padding:18px 0}
.faq-item:last-child{border-bottom:1px solid var(--border)}
.faq-q{background:none;border:none;padding:0;width:100%;text-align:left;font-family:var(--sans);font-size:.95rem;font-weight:600;color:var(--text-1);display:flex;justify-content:space-between;align-items:center;gap:12px}
.faq-toggle{font-size:1.2rem;color:var(--gold);flex-shrink:0;transition:transform .2s}
.faq-item.open .faq-toggle{transform:rotate(45deg)}
.faq-a{font-size:.88rem;color:var(--text-2);line-height:1.65;max-height:0;overflow:hidden;transition:max-height .3s ease,padding-top .3s}
.faq-item.open .faq-a{max-height:300px;padding-top:12px}

.disclaimer{font-size:.75rem;color:var(--text-3);line-height:1.6;border-top:1px solid var(--border);padding-top:24px;margin-bottom:32px}
.footer{display:flex;flex-direction:column;align-items:center;gap:8px;text-align:center;padding-bottom:16px}
.footer-brand{font-family:var(--serif);font-size:1.1rem;font-weight:700;color:var(--text-1)}
.footer-agent{font-size:.82rem;color:var(--text-2)}
.footer-contact{display:flex;flex-wrap:wrap;justify-content:center;gap:16px;font-size:.82rem;color:var(--text-2)}
.footer-contact a{color:var(--gold)}
.footer-legal{font-size:.72rem;color:var(--text-3);margin-top:4px}

@media(max-width:480px){
  .hero{padding:40px 16px 36px}
  .intro-body{padding:28px 20px 32px}
  .question-body{padding:20px 20px 20px}
  .quiz-nav{padding:0 20px 24px}
  .quiz-header{padding:16px 20px 0}
  .results-top{padding:24px 20px 20px;flex-direction:column}
  .cat-bars,.timeline-section,.delivery-section,.gate-section{padding:20px}
  .confirm-body{padding:36px 20px}
  .grade-circle{width:88px;height:88px;min-width:88px}
  .grade-letter{font-size:2.4rem}
}
</style>
</head>
<body>

<header class="hero">
  <p class="hero-eyebrow">Reside in KC · Free Seller Tool</p>
  <h1>What Grade Does Your Home Deserve Right Now?</h1>
  <p class="hero-sub">18 honest questions. An A–F readiness score. A specific action plan — whether you're selling in 3 months or 3 years.</p>
  <span class="data-badge">📊 Used by Kansas City homeowners to add $12K–$38K before listing</span>
</header>

<div class="page-wrap">
  <div class="quiz-card">

    <div id="screen-intro" class="screen active">
      <div class="intro-body">
        <h2>Your KC Home Sale Readiness Score</h2>
        <p>This isn't a generic checklist. Each question reflects what KC buyers, inspectors, and appraisers actually flag in this market — and where sellers leave money behind.</p>
        <div class="intro-pills">
          <span class="intro-pill">⏱ 4–5 minutes</span>
          <span class="intro-pill">📊 Instant grade</span>
          <span class="intro-pill">🔒 No commitment</span>
          <span class="intro-pill">🏡 KC-specific data</span>
        </div>
        <button class="btn-primary" onclick="startQuiz()">Get My Grade →</button>
        <p class="intro-fine">No spam. Your info is never sold. Jarred Donalson, REALTOR® · Reside in KC</p>
      </div>
    </div>

    <div id="screen-quiz" class="screen">
      <div class="progress-bar-wrap"><div class="progress-bar-fill" id="progress-fill"></div></div>
      <div class="quiz-header">
        <span class="quiz-category" id="q-category"></span>
        <span class="quiz-counter" id="q-counter"></span>
      </div>
      <div class="question-body" id="question-body"></div>
      <div class="quiz-nav" id="quiz-nav"></div>
    </div>

    <div id="screen-results" class="screen">
      <div class="results-top">
        <div class="grade-circle" id="grade-circle">
          <span class="grade-letter" id="grade-letter">A</span>
          <span class="grade-score-label" id="grade-score-lbl"></span>
        </div>
        <div class="results-headline-block">
          <h2 class="results-headline" id="results-headline"></h2>
          <p class="results-copy" id="results-copy"></p>
        </div>
      </div>
      <div class="cat-bars">
        <h3>Your Score by Category</h3>
        <div id="cat-bars-body"></div>
      </div>
      <div class="timeline-section">
        <h3>When are you thinking about selling?</h3>
        <div class="timeline-pills" id="timeline-pills">
          <button class="timeline-pill" onclick="selectTimeline(this,'Within 3 months')">Within 3 months</button>
          <button class="timeline-pill" onclick="selectTimeline(this,'3–6 months')">3–6 months</button>
          <button class="timeline-pill" onclick="selectTimeline(this,'6–12 months')">6–12 months</button>
          <button class="timeline-pill" onclick="selectTimeline(this,'Over a year')">Over a year</button>
          <button class="timeline-pill" onclick="selectTimeline(this,'Just researching')">Just researching</button>
        </div>
      </div>
      <div class="delivery-section">
        <h3>How would you like your full report?</h3>
        <p>Your grade is just the headline. The report shows exactly where value is hiding — and where to stop spending.</p>
        <div class="delivery-options">
          <button class="delivery-opt selected" onclick="selectDelivery(this,'instant')">
            <div class="delivery-opt-name">📨 Instant Email Report <span class="delivery-tag">Most popular</span></div>
            <div class="delivery-opt-desc">Your full breakdown, category scores, and priority fixes — in your inbox in under 60 seconds.</div>
          </button>
          <button class="delivery-opt" onclick="selectDelivery(this,'ai')">
            <div class="delivery-opt-name">🤖 AI-Enhanced Analysis <span class="delivery-tag amber">Deeper</span></div>
            <div class="delivery-opt-desc">Everything above plus an AI-generated prep sequence tailored to your answers and your KC zip code.</div>
          </button>
          <button class="delivery-opt" onclick="selectDelivery(this,'cma')">
            <div class="delivery-opt-name">🏡 In-Person Review + Free CMA</div>
            <div class="delivery-opt-desc">Jarred walks your home, validates your score, and hands you a real Comparative Market Analysis — no obligation.</div>
          </button>
        </div>
      </div>
      <div class="gate-section">
        <h3>Where should we send your report?</h3>
        <div class="gate-form" id="gate-form">
          <div class="gate-row">
            <div class="gate-field"><label>First Name</label><input type="text" id="f-first" placeholder="Jane" autocomplete="given-name"></div>
            <div class="gate-field"><label>Last Name</label><input type="text" id="f-last" placeholder="Smith" autocomplete="family-name"></div>
          </div>
          <div class="gate-field"><label>Email Address</label><input type="email" id="f-email" placeholder="jane@example.com" autocomplete="email"></div>
          <div class="gate-field"><label>Phone (optional — for CMA scheduling)</label><input type="tel" id="f-phone" placeholder="(816) 555-0100" autocomplete="tel"></div>
          <div class="gate-field"><label>Home Address or Zip Code</label><input type="text" id="f-address" placeholder="64155" autocomplete="postal-code"></div>
          <p class="form-error" id="form-error">Please fill in your name, email, and zip code to receive your report.</p>
          <button class="btn-gate" id="gate-btn" onclick="submitGate()">Send My Report →</button>
          <p class="gate-consent">By submitting, you agree to be contacted by Jarred Donalson, REALTOR®, Keller Williams KC North. No spam. Unsubscribe anytime.</p>
        </div>
      </div>
    </div>

    <div id="screen-confirm" class="screen">
      <div class="confirm-body">
        <div class="confirm-icon">✓</div>
        <h2>You're all set — check your inbox.</h2>
        <p>Your personalized KC Home Sale Readiness Report is on its way. Jarred reviews every submission personally and will follow up with your full analysis.</p>
        <div class="confirm-contact">
          <a href="tel:8167190829">📞 816-719-0829</a>
          <a href="mailto:jarred.donalson@kw.com">✉ jarred.donalson@kw.com</a>
        </div>
      </div>
    </div>

  </div>

  <div class="below-card">
    <div class="whats-next">
      <p class="section-eyebrow">What Comes Next</p>
      <h2 class="section-heading">Three ways Jarred helps KC sellers win</h2>
      <p class="section-sub">Whether you're 3 weeks or 3 years from listing, there's a right next step.</p>
      <div class="next-cards">
        <div class="next-card">
          <div class="next-card-icon">🔧</div>
          <h4>Prepare to Maximize Value</h4>
          <p>A prioritized prep list built around your score — what to fix, what to skip, and what order to do it in.</p>
          <a href="mailto:jarred.donalson@kw.com">Get your prep plan →</a>
        </div>
        <div class="next-card">
          <div class="next-card-icon">📊</div>
          <h4>Know Your Real Number</h4>
          <p>A Comparative Market Analysis that reflects your home's actual condition — not just the algorithm's guess.</p>
          <a href="tel:8167190829">Schedule a free CMA →</a>
        </div>
        <div class="next-card">
          <div class="next-card-icon">📘</div>
          <h4>The KC Seller's Playbook</h4>
          <p>A step-by-step guide to KC's market conditions, typical buyer expectations, and how to time your sale.</p>
          <a href="mailto:jarred.donalson@kw.com">Get the guide →</a>
        </div>
      </div>
    </div>

    <div class="faq-section">
      <p class="section-eyebrow">Common Questions</p>
      <h2 class="section-heading">What sellers ask before they take the quiz</h2>
      <div style="margin-top:24px">
        <div class="faq-item" onclick="toggleFaq(this)">
          <button class="faq-q">Do I have to be ready to sell to take this? <span class="faq-toggle">+</span></button>
          <div class="faq-a">Not at all. Most people take it 6–18 months before they list — because that's when the score actually matters. You'll know exactly what to tackle and in what order. The grade is just a starting point; the real value is the prioritized prep list you get with it.</div>
        </div>
        <div class="faq-item" onclick="toggleFaq(this)">
          <button class="faq-q">Is this just a sales pitch? <span class="faq-toggle">+</span></button>
          <div class="faq-a">The score is real and the questions are designed to give you an honest picture — not a flattering one. Jarred's business is built on repeat clients and referrals, so there's no incentive to sugarcoat your results. If your home grades out as an A, we'll tell you. If it grades as a D, we'll tell you that too — and give you a 30-day plan to change it.</div>
        </div>
        <div class="faq-item" onclick="toggleFaq(this)">
          <button class="faq-q">How is this different from a Zestimate? <span class="faq-toggle">+</span></button>
          <div class="faq-a">A Zestimate tells you what the algorithm thinks your home is worth based on public data — it doesn't know whether your HVAC is 22 years old, if your foundation has been professionally repaired, or what your paint colors look like in listing photos. This quiz measures your home's condition and presentation readiness, which directly affects what buyers will offer.</div>
        </div>
        <div class="faq-item" onclick="toggleFaq(this)">
          <button class="faq-q">What happens after I submit my contact info? <span class="faq-toggle">+</span></button>
          <div class="faq-a">You get an email with your score breakdown and the category-specific notes. Jarred personally reviews every submission. If you asked for the In-Person CMA option, his team will reach out within one business day to schedule. There's no high-pressure follow-up — just a real conversation when you're ready.</div>
        </div>
      </div>
    </div>

    <p class="disclaimer">This assessment is intended for informational and educational purposes only. Grade calculations are based on responses provided and do not constitute a formal appraisal, inspection report, or guaranteed sale price. Market conditions in the Kansas City metro area vary by neighborhood, zip code, season, and buyer demand. Actual results will differ. Jarred Donalson is a licensed REALTOR® with Keller Williams KC North. Equal Housing Opportunity.</p>

    <footer class="footer">
      <div class="footer-brand">Reside in KC</div>
      <div class="footer-agent">Jarred Donalson, REALTOR® · Keller Williams KC North</div>
      <div class="footer-contact">
        <a href="tel:8167190829">816-719-0829</a>
        <a href="mailto:jarred.donalson@kw.com">jarred.donalson@kw.com</a>
      </div>
      <div class="footer-legal">© 2026 Reside in KC. All rights reserved. Equal Housing Opportunity.</div>
    </footer>
  </div>
</div>

<script>
const CATS={curb:{label:'Curb Appeal & Exterior',weight:.25},cond:{label:'Condition & Maintenance',weight:.30},interior:{label:'Interior Presentation',weight:.25},updates:{label:'Updates & Systems',weight:.20}};
const GRADES=[
  {min:85,g:'A',color:'#111111',head:'Ready to sell. The only variable left is strategy.',copy:"Your home is positioned well. The only variable left is strategy — pricing, timing, and marketing. Let's talk about how to turn that prep into maximum offers."},
  {min:70,g:'B',color:'#b8912a',head:'High potential. A focused weekend stands between you and top dollar.',copy:'High potential. Your report flags the 2–3 items most likely to shift buyer perception — and the ones you can skip entirely. The gap between a B and an A is usually smaller than sellers think.'},
  {min:55,g:'C',color:'#b07a2a',head:"Solid foundation, real opportunity — here's where the money is hiding.",copy:"Your home is a great place to live. It needs a clear prep sequence before it competes at the top of the market. The good news: most of the items in your report are low-cost, high-return."},
  {min:40,g:'D',color:'#a85e33',head:"Listing now would cost you. Here's your 30-day plan.",copy:"This isn't a grade on your home — it's a grade on your current market leverage. Your report outlines the specific items dragging the score and a 30-day sequence that can move the needle before you go live."},
  {min:0,g:'F',color:'#9a3e30',head:'Good news: you found out now, not under contract.',copy:"Good news: you found out now, not under contract. We'll build a 90-day game plan focused on the highest-return improvements so you list from a position of strength — not desperation."}
];
const QUESTIONS=[
  {cat:'curb',text:"Stand across the street from your house. What do you actually see?",opts:["Fresh mulch, clean beds, defined edges, healthy lawn","Healthy yard and tidy beds, a few spots to touch up","Lawn is kept but beds are sparse or bare","Overgrown, sparse, or yard clutter visible"],scores:[10,7,3,0],why:"Peer-reviewed research found curb appeal can account for up to 7% of a home's sale price. In KC's competitive spring and fall markets, buyers form an opinion before they even reach the front door."},
  {cat:'curb',text:"Your garage door and front entry door — what's the honest condition?",opts:["Both replaced or professionally refinished within ~5 years","One is newer, one is showing age","Both are original and show wear","Dented, rusted, peeling, or clearly outdated"],scores:[10,7,3,0],why:"Industry surveys consistently rank the garage door and entry door as two of the highest-ROI exterior investments a seller can make before listing — often returning 90–100% of cost in improved offers."},
  {cat:'curb',text:"Exterior paint, siding, gutters, roofline — any visible wear from the sidewalk?",opts:["None — everything looks clean and intact","A spot or two that needs touch-up","Noticeable peeling, fading, or sagging in one area","Obvious damage, rot, or deferred maintenance visible"],scores:[10,7,3,0],why:"Researchers found a well-kept exterior signals to buyers that the inside has been cared for too. Visible exterior neglect triggers mental price reductions before the showing even starts."},
  {cat:'cond',text:"If a home inspector walked through tomorrow, what would the report say?",opts:["Clean — well-maintained with service records to back it up","Short punch list of minor items","One system we're 'keeping an eye on'","Known significant issue we haven't addressed yet"],scores:[10,7,3,0],why:"Inspection surprises are a leading reason deals die or renegotiate after contract. Buyers who discover deferred maintenance they didn't know about often walk — or ask for double the actual repair cost as a concession."},
  {cat:'cond',text:"Age and service status of your big three: roof, HVAC, water heater?",opts:["All under ~10 years old or recently serviced with documentation","Mostly newer — one system is aging","Two are at or past their expected service life","All aging with no service records"],scores:[10,7,3,0],why:"Buyers and their inspectors price aging systems into every offer. A roof with 3–4 years of estimated life remaining can trigger requests for $8,000–$15,000 in concessions on a Kansas City home, even before negotiation begins."},
  {cat:'cond',text:"Anything you'd legally have to disclose to a buyer?",opts:["Nothing — clean to the best of my knowledge","Past issue, professionally repaired, fully documented","One unresolved minor item","Unresolved issues that haven't been priced into our expectations"],scores:[10,7,3,0],why:"Kansas City buyers increasingly walk — or negotiate hard — at 'any inkling' of needed repairs. Disclosed, repaired items with documentation are far less damaging than surprises found during inspection."},
  {cat:'cond',text:"The KC reality check: foundation, radon, and sewer lateral — where do you stand?",sub:"Kansas City sits on expansive clay soil — these are THE local inspection flashpoints.",opts:["All handled — tested, repaired if needed, documented","No known issues, but never formally tested","One flag we know about","Known unresolved issues"],scores:[10,7,3,0],why:"KC's clay soil swells when wet and shrinks in drought — foundation movement is common and buyers know it. Radon is prevalent in the metro. Sewer laterals on older KC homes frequently need lining or replacement."},
  {cat:'interior',text:"Walk your main living areas. Could a stranger picture their own furniture here?",opts:["Yes — decluttered, depersonalized, and ready for photos","Mostly — it would take a weekend of editing","Lived-in — a lot packed into the space","Every room is full; buyers would be focused on our stuff, not the home"],scores:[10,7,3,0],why:"83% of buyer's agents say staging makes it easier for buyers to visualize themselves in the property. The reverse is equally true: crowded, personalized spaces shrink perceived square footage and reduce emotional connection to the home."},
  {cat:'interior',text:"Main interior walls — when painted, and what colors?",opts:["Within the last ~3 years, in a neutral or nature-inspired palette","4–8 years ago, and the colors are still neutral","Bold, personalized, or dated colors — or there's scuffing and wear","Can't remember the last time, or there's visible damage"],scores:[10,7,3,0],why:"Zillow's buyer research found paint color alone can swing offers by thousands of dollars. Neutral, current palette choices help buyers mentally move in. Bold or dated choices create a mental renovation budget."},
  {cat:'interior',text:"How would your kitchen and primary bath look in listing photos?",opts:["Photo-ready — these rooms would lead the listing","Good with a deep clean — minor staging would help","Fine in person, but dated or cluttered on camera","Rooms I'd want cropped out of the photos"],scores:[10,7,3,0],why:"73–88% of agents rank photos as the most important marketing tool in their toolkit. Kitchen and primary bath photos drive clicks — and clicks drive showings."},
  {cat:'interior',text:"The smell test — first 10 seconds inside your front door, what does a guest notice?",sub:"Be honest: ask a friend who doesn't live there.",opts:["Nothing — or a fresh, neutral scent","Occasional cooking or pet smells that air out","Persistent pet, smoke, or musty odor","It's soaked into the carpet and walls — not a quick fix"],scores:[10,7,3,0],why:"Odor is the presentation problem staging can't hide. It triggers an immediate, involuntary negative reaction — and KC buyers and their agents will note it in feedback every time."},
  {cat:'updates',text:"In the last 10 years, what have you meaningfully updated?",opts:["Two or more of: kitchen, baths, flooring, windows, or exterior","One meaningful update in the last decade","Cosmetic refreshes only — paint, fixtures, hardware","Essentially original — no meaningful updates"],scores:[10,7,3,0],why:"Buyers mentally price in the updates a home needs. A home with two or more completed updates in key areas can command 8–15% more than a comparable original home."},
  {cat:'updates',text:"Kitchen and baths specifically — what era do they read as?",opts:["Current or recently updated — buyers would call them 'updated'","Clean and classic — not distracting, not a selling point","Original from 10–20 years ago — buyers will notice","Clearly dated (20+ years) — buyers will budget a remodel"],scores:[10,7,3,0],why:"KC-specific truth: a minor kitchen remodel returns roughly 87 cents on the dollar at resale — but leaving a visibly dated kitchen unaddressed costs sellers much more in buyer perception and days on market."},
  {cat:'updates',text:"Do you have documentation — receipts, warranties, permits — for work done on the home?",opts:["Yes — organized and reasonably complete","Most of it — some gaps but the major items are covered","Scattered — some receipts, some verbal warranties","No documentation at all"],scores:[10,7,3,0],why:"Documentation converts 'trust me' into proof. Buyers who can see a paper trail for roof replacement, HVAC service, and permitted additions offer more and negotiate less."},
  {cat:null,unscored:true,text:"When are you thinking about selling?",opts:["Within 3 months","3–6 months","6–12 months","Over a year from now","Just exploring my options"]},
  {cat:null,unscored:true,text:"What matters most to you in a sale?",opts:["Highest possible price","Fastest possible close","Least hassle and disruption","Coordinating with a purchase","I'm not sure yet"]},
  {cat:null,unscored:true,text:"What do you believe your home is worth — and how did you land on that number?",opts:["A recent agent analysis or CMA","An online estimate (Zestimate, Redfin, etc.)","A neighbor's recent sale","Gut feel or a number I have in mind"]},
  {cat:null,unscored:true,multi:true,text:"Do any of these describe your home?",sub:"Check all that apply — these don't affect your grade, but they shape smart pricing.",opts:["Backs to or faces a busy road","High-tension power lines adjacent to the property","Unusual or functionally obsolete floor plan","None of these apply"],why:"The grade measures what you can control. You can't move a road — but a smart pricing strategy and the right buyer pool offset these factors."}
];

let idx=0,answers={},selectedTimeline='',selectedDelivery='instant',multiSelected={};

function startQuiz(){idx=0;answers={};multiSelected={};show('quiz');render()}
function show(s){document.querySelectorAll('.screen').forEach(x=>x.classList.remove('active'));document.getElementById('screen-'+s).classList.add('active');window.scrollTo(0,0)}
function render(){
  const q=QUESTIONS[idx],total=QUESTIONS.length,pct=(idx/total)*100;
  document.getElementById('progress-fill').style.width=pct+'%';
  document.getElementById('q-category').textContent=q.cat?CATS[q.cat].label:'About You';
  document.getElementById('q-counter').textContent=(idx+1)+' of '+total;
  const body=document.getElementById('question-body');
  let html='<div class="q-text">'+q.text+'</div>';
  if(q.sub)html+='<div class="q-sub">'+q.sub+'</div>';
  html+='<div class="options">';
  if(q.multi){
    if(!multiSelected[idx])multiSelected[idx]=new Set();
    q.opts.forEach((opt,i)=>{const sel=multiSelected[idx].has(i);html+='<button class="option'+(sel?' selected':'')+'" onclick="toggleMulti('+i+','+idx+')"><span class="opt-check multi"><span class="opt-check-inner"></span></span>'+opt+'</button>'});
  }else{
    q.opts.forEach((opt,i)=>{const sel=answers[idx]===i;html+='<button class="option'+(sel?' selected':'')+'" onclick="selectOpt('+i+')"><span class="opt-check"><span class="opt-check-inner"></span></span>'+opt+'</button>'});
  }
  html+='</div>';
  if(q.why)html+='<div class="why-box"><strong>Why it matters:</strong> '+q.why+'</div>';
  body.innerHTML=html;
  const nav=document.getElementById('quiz-nav'),hasBack=idx>0,isLast=idx===total-1;
  if(q.multi){
    nav.innerHTML=(hasBack?'<button class="btn-back" onclick="goBack()">← Back</button>':'<span></span>')+'<button class="btn-next-multi" onclick="nextFromMulti()">'+(isLast?'See My Grade →':'Next →')+'</button>';
  }else{
    const answered=answers[idx]!==undefined;
    nav.innerHTML=(hasBack?'<button class="btn-back" onclick="goBack()">← Back</button>':'<span></span>')+'<button class="btn-next" id="btn-next" onclick="advance()" '+(answered?'':'disabled')+'>'+(isLast?'See My Grade →':'Next →')+'</button>';
  }
}
function selectOpt(i){answers[idx]=i;render();if(!QUESTIONS[idx].unscored&&idx<QUESTIONS.length-1)setTimeout(()=>advance(),280)}
function toggleMulti(optIdx,qIdx){if(!multiSelected[qIdx])multiSelected[qIdx]=new Set();const set=multiSelected[qIdx],q=QUESTIONS[qIdx],noneIdx=q.opts.indexOf('None of these apply');if(optIdx===noneIdx){set.clear();set.add(noneIdx)}else{if(set.has(noneIdx))set.delete(noneIdx);if(set.has(optIdx))set.delete(optIdx);else set.add(optIdx)}render()}
function nextFromMulti(){answers[idx]=Array.from(multiSelected[idx]||new Set());advance()}
function advance(){if(idx<QUESTIONS.length-1){idx++;render()}else{finish()}}
function goBack(){if(idx>0){idx--;render()}}
function computeScore(){
  const catSums={curb:[],cond:[],interior:[],updates:[]};
  QUESTIONS.forEach((q,i)=>{if(!q.unscored&&q.cat&&answers[i]!==undefined)catSums[q.cat].push(q.scores[answers[i]])});
  let weighted=0;const catPcts={};
  Object.entries(catSums).forEach(([key,vals])=>{if(!vals.length){catPcts[key]=0;return}const avg=vals.reduce((a,b)=>a+b,0)/vals.length;catPcts[key]=avg*10;weighted+=catPcts[key]*CATS[key].weight});
  return{score:Math.round(weighted),catPcts};
}
function finish(){
  const{score,catPcts}=computeScore(),gradeObj=GRADES.find(g=>score>=g.min)||GRADES[GRADES.length-1];
  document.getElementById('grade-circle').style.background=gradeObj.color;
  document.getElementById('grade-letter').textContent=gradeObj.g;
  document.getElementById('grade-score-lbl').textContent=score+' / 100';
  document.getElementById('results-headline').textContent=gradeObj.head;
  document.getElementById('results-copy').textContent=gradeObj.copy;
  document.getElementById('cat-bars-body').innerHTML=Object.entries(CATS).map(([key,cat])=>{const pct=Math.round(catPcts[key]||0);return'<div class="cat-bar-row"><div class="cat-bar-label"><span>'+cat.label+'</span><span class="cat-bar-pct">'+pct+'%</span></div><div class="cat-bar-track"><div class="cat-bar-fill" data-pct="'+pct+'"></div></div></div>'}).join('');
  show('results');
  setTimeout(()=>document.querySelectorAll('.cat-bar-fill').forEach(el=>el.style.width=el.dataset.pct+'%'),100);
}
function selectTimeline(btn,val){selectedTimeline=val;document.querySelectorAll('.timeline-pill').forEach(p=>p.classList.remove('active'));btn.classList.add('active')}
function selectDelivery(btn,mode){selectedDelivery=mode;document.querySelectorAll('.delivery-opt').forEach(d=>d.classList.remove('selected'));btn.classList.add('selected');const labels={instant:'Send My Instant Report →',ai:'Send My AI-Enhanced Report →',cma:'Book My Free CMA →'};document.getElementById('gate-btn').textContent=labels[mode]||'Send My Report →'}
function submitGate(){
  const first=document.getElementById('f-first').value.trim(),last=document.getElementById('f-last').value.trim(),email=document.getElementById('f-email').value.trim(),addr=document.getElementById('f-address').value.trim(),errEl=document.getElementById('form-error');
  ['f-first','f-last','f-email','f-address'].forEach(id=>document.getElementById(id).classList.remove('error'));
  let errs=[];
  if(!first){errs.push(1);document.getElementById('f-first').classList.add('error')}
  if(!last){errs.push(1);document.getElementById('f-last').classList.add('error')}
  if(!email||!email.includes('@')){errs.push(1);document.getElementById('f-email').classList.add('error')}
  if(!addr){errs.push(1);document.getElementById('f-address').classList.add('error')}
  if(errs.length){errEl.style.display='block';return}
  errEl.style.display='none';show('confirm');
}
function toggleFaq(item){item.classList.toggle('open')}
document.addEventListener('keydown',e=>{if(e.key==='Enter'&&document.getElementById('screen-quiz').classList.contains('active')){const b=document.getElementById('btn-next');if(b&&!b.disabled)b.click()}});
</script>
</body>
</html>
<?php exit; ?>
