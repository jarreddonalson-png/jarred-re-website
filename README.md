# Jarred Real Estate — WordPress Theme

Custom WordPress theme built for a personal-brand real estate site.  
**Colors:** Black `#000000` + Gold `#ba871d`  
**Fonts:** Cormorant Garamond (display) + Inter (body)

---

## Project Structure

```
jarred-re/
├── style.css              ← Theme header + all CSS (design tokens, layout, components)
├── functions.php          ← Theme setup, CPTs, schema markup, contact form handler
├── header.php             ← Fixed nav header
├── footer.php             ← Footer with links, contact info, disclaimer
├── front-page.php         ← Homepage
├── page.php               ← Generic page template
├── page-about.php         ← About Me page (Template: About)
├── page-contact.php       ← Contact page with AJAX form (Template: Contact)
├── single.php             ← Single blog post
├── archive.php            ← Blog/neighborhood/resource archive
├── index.php              ← Fallback / blog home
├── assets/
│   └── js/main.js         ← Header scroll, mobile menu, scroll-reveal, counter animation
│   └── images/            ← Place hero-bg.jpg and agent photo here
└── .github/
    └── workflows/
        └── deploy.yml     ← Auto-deploy to SiteGround on push to main
```

---

## 1. Create a GitHub Account

1. Go to [github.com](https://github.com) and click **Sign up**
2. Choose a username (e.g. `jarredrealestate`), enter your email and password
3. Verify your email address

---

## 2. Create a Repository

1. Click the **+** icon → **New repository**
2. Name it: `jarred-re-website`
3. Set it to **Private**
4. Click **Create repository**

---

## 3. Install Git on Your Computer

- **Mac:** Git is usually pre-installed. Open Terminal and type `git --version`
- **Windows:** Download from [git-scm.com](https://git-scm.com)

---

## 4. Upload the Theme Code

Open Terminal (Mac) or Git Bash (Windows):

```bash
# Navigate to a folder where you want to keep the project
cd ~/Documents

# Clone your empty GitHub repo
git clone https://github.com/YOUR-USERNAME/jarred-re-website.git
cd jarred-re-website

# Create the WordPress theme folder structure
mkdir -p wp-content/themes/jarred-re

# Copy all theme files into that folder, then:
git add .
git commit -m "Initial theme commit"
git push origin main
```

---

## 5. Set Up Auto-Deploy to SiteGround

The `deploy.yml` workflow auto-deploys your theme to SiteGround every time you push to `main`.  
You need to add 4 **Secrets** to your GitHub repo:

1. Go to your repo → **Settings** → **Secrets and variables** → **Actions** → **New repository secret**

| Secret Name | Where to find it |
|---|---|
| `SITEGROUND_HOST` | SiteGround dashboard → **Devs** → **SSH Keys** (the server hostname, e.g. `sg1234.siteground.biz`) |
| `SITEGROUND_USER` | Same SSH section — the SSH username |
| `SITEGROUND_SITE` | The site folder name on SiteGround (usually your domain without the TLD) |
| `SITEGROUND_SSH_PRIVATE_KEY` | Generate an SSH key in SiteGround → **Devs** → **SSH Keys Manager**, copy the **private** key |

---

## 6. Install Theme on WordPress

1. Log in to SiteGround → **WordPress** → **WP Admin**
2. **Appearance** → **Themes** → **Add New** → **Upload Theme**
3. Upload the `jarred-re.zip` (or use WP Admin after first GitHub deploy)
4. Activate the theme

---

## 7. Configure Your Info

1. In WP Admin → **Appearance** → **Customize** → **Agent Info**
2. Fill in your name, phone, email, license number, brokerage, and bio
3. Add your photo via the Custom Logo setting or the `agent_photo` field
4. **Publish**

---

## 8. Create These Pages in WordPress

Go to **Pages** → **Add New** and create:

| Page Title | Template |
|---|---|
| Home | (set as static front page in Settings → Reading) |
| About | About |
| Contact | Contact |
| Blog | (set as Posts page in Settings → Reading) |
| Neighborhoods | (default — archive handled automatically) |
| Buyer Resources | (default page — add content) |
| Seller Resources | (default page — add content) |

---

## 9. Set Up Navigation

**Appearance** → **Menus** → Create a menu called "Primary" with:
- About
- Neighborhoods
- Resources (dropdown: Buyers / Sellers)
- Blog
- Contact

Assign it to the **Primary Navigation** location.

---

## Adding Neighborhoods

1. In WP Admin → **Neighborhoods** → **Add New**
2. Add a title (e.g. "Brookside"), featured image, description
3. Optionally add a custom field `neighborhood_tagline` for the subtitle on the card

---

## Hero Image

Place your hero background image at:
```
assets/images/hero-bg.jpg
```
Recommended: 1920×1080px, professionally shot Kansas City skyline or neighborhood photo.

---

## Deploying Changes

After setup, your workflow is:
1. Edit files locally
2. `git add . && git commit -m "describe change" && git push`
3. GitHub Actions auto-deploys to SiteGround in ~60 seconds ✅

---

## Next Steps (Phase 2)

- [ ] Add IDX plugin (Showcase IDX or iHomefinder recommended)
- [ ] Install Yoast SEO or Rank Math for meta/sitemap management
- [ ] Set up Google Analytics 4
- [ ] Add Google Business Profile link to footer
- [ ] Create neighborhood and blog content
