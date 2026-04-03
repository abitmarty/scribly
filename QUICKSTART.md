# Scribly - Quick Start Guide

## 📋 What You Have

A production-ready Laravel 11 SaaS landing page for Scribly with:
- Beautiful responsive design (hero, benefits, pricing, contact form)
- Lead capture with file uploads
- Secure file storage
- Email notifications
- MySQL database for lead persistence

## 🚀 Local Development (30 seconds)

```bash
# 1. Install
composer install

# 2. Generate key
php artisan key:generate

# 3. Run migrations
php artisan migrate

# 4. Start
php artisan serve
```

Visit `http://localhost:8000`

## 🌍 Deploy to Cloud86 (5 steps)

### Step 1: Create Database
- Log into Cloud86 cPanel
- Go to "MySQL Databases"
- Create: `scribly_db`
- Create user: `scribly_user` with password
- Grant ALL PRIVILEGES

### Step 2: Upload Files
- Upload entire `/scribly` folder to `/home/username/scribly/` (NOT `public_html`)
- Via FTP or cPanel File Manager

### Step 3: Configure Domain
- In cPanel → "Domains"
- Set Document Root to: `/home/username/scribly/public`

### Step 4: Create .env
- In `/home/username/scribly/`, create `.env` file:

```ini
APP_NAME=Scribly
APP_ENV=production
APP_KEY=base64:COPY_FROM_LOCAL_ENV
APP_DEBUG=false
APP_URL=https://scribly.nl
DB_HOST=localhost
DB_DATABASE=scribly_db
DB_USERNAME=scribly_user
DB_PASSWORD=YOUR_PASSWORD
MAIL_MAILER=smtp
MAIL_HOST=your-mail-server
MAIL_USERNAME=info@scribly.nl
MAIL_PASSWORD=your-email-password
ADMIN_EMAIL=your-admin@example.com
```

### Step 5: Run Migration
Via SSH or cPanel Terminal:
```bash
php artisan migrate --force
```

Done! Visit your domain.

## 📚 Documentation

- **[SETUP.md](./SETUP.md)** — Full deployment guide
- **[DEPLOY_CHECKLIST.md](./DEPLOY_CHECKLIST.md)** — Step-by-step checklist
- **[PROJECT_OVERVIEW.md](./PROJECT_OVERVIEW.md)** — Technical details
- **[README.md](./README.md)** — Feature overview

## 🛠️ Key Files to Know

| File | Purpose |
|------|---------|
| `resources/views/layouts/app.blade.php` | Fonts, colors, CDN imports |
| `resources/views/partials/hero.blade.php` | Main headline & CTA |
| `resources/views/partials/pricing.blade.php` | Pricing tiers |
| `resources/views/partials/upload-form.blade.php` | Lead form |
| `app/Http/Controllers/LeadController.php` | Form processing |
| `.env` | Configuration |

## ✅ Verify Installation

After deploying:

1. Visit your domain → Should see dark navy hero section
2. Scroll through → All sections visible
3. Test form → Fill in, upload 2 CSV files, submit
4. Check email → Admin should receive notification
5. Check database → Lead record should appear

## 🔧 Quick Customization

### Change headline text
Edit `resources/views/partials/hero.blade.php`

### Change pricing
Edit `resources/views/partials/pricing.blade.php`

### Change form fields
Edit `resources/views/partials/upload-form.blade.php` + `app/Http/Requests/LeadSubmissionRequest.php`

### Change colors
Edit `resources/views/layouts/app.blade.php` → Tailwind config

## 📞 Support

- Blank page? Check `storage/logs/laravel.log`
- DB error? Verify credentials in `.env`
- Mail not working? Check SMTP settings in `.env`
- Styles broken? Clear browser cache, check console

See [SETUP.md](./SETUP.md#troubleshooting) for more.

---

**Version:** 1.0.0  
**Status:** Ready to deploy  
**Time to deploy:** 30-45 minutes
