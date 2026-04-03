# Scribly - Setup & Deployment Guide

## Local Development

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js (optional, for future enhancements)

### Installation

1. **Install dependencies**
   ```bash
   composer install
   ```

2. **Copy environment file** (already done in `composer create-project`)
   ```bash
   cp .env.example .env
   ```

3. **Generate app key** (already done)
   ```bash
   php artisan key:generate
   ```

4. **Run migrations**
   ```bash
   php artisan migrate
   ```

5. **Start development server**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000`

### Email Testing Locally

To test emails locally without sending real emails:

```bash
php artisan tinker
```

Then:
```php
Mail::to('test@example.com')->send(new \App\Mail\NewLeadNotification($lead));
```

Emails won't actually send in local mode unless you configure SMTP. See configuration below.

---

## Deployment to Cloud86 Shared Hosting

### Step 1: Prepare Your Local Project

Cache configuration for production (do this before uploading):

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 2: Create Clean Production Archive

```bash
# Remove unnecessary files
rm -rf tests/
rm -rf node_modules/
rm -f package.json
rm -f webpack.mix.js
rm -f vite.config.js

# Create archive for upload
zip -r scribly-production.zip . \
  -x "*.git*" \
  -x ".env*" \
  -x "storage/*" \
  -x "bootstrap/cache/*" \
  -x "*.DS_Store"
```

### Step 3: Upload to Cloud86

**Via cPanel File Manager or FTP:**

1. Log into your Cloud86 cPanel dashboard
2. Open File Manager
3. Navigate to your home directory (NOT `public_html`)
4. Upload `scribly-production.zip` and extract it
5. Create a directory `/home/username/scribly/` and extract the files there

**Via SSH (if available):**
```bash
# Connect to your server
ssh username@your-server.cloud86.nl

# Upload and extract
cd ~
unzip scribly-production.zip -d scribly/
cd scribly/
```

### Step 4: Configure Document Root in cPanel

**Recommended approach (BEST):**

1. In cPanel → "Domains" or "Addon Domains"
2. Find your domain (e.g., `scribly.nl`)
3. Set the **Document Root** to: `/home/username/scribly/public`
4. Save

This is the cleanest and most secure setup. No .htaccess hacks needed.

### Step 5: Create MySQL Database

1. In cPanel → "MySQL Databases"
2. Create new database: `scribly_db` (or similar)
3. Create new user: `scribly_user` with a strong password
4. Add user to database with ALL PRIVILEGES

### Step 6: Upload .env File

**VIA cPanel File Manager:**

1. Click the home icon to go to your home directory
2. Navigate to `/scribly/`
3. Create a new file `.env` and paste:

```ini
APP_NAME=Scribly
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_TIMEZONE=Europe/Amsterdam
APP_URL=https://scribly.nl

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=scribly_db
DB_USERNAME=scribly_user
DB_PASSWORD=YOUR_DB_PASSWORD

MAIL_MAILER=smtp
MAIL_HOST=your-mail-server.com
MAIL_PORT=587
MAIL_USERNAME=info@scribly.nl
MAIL_PASSWORD=YOUR_EMAIL_PASSWORD
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@scribly.nl
MAIL_FROM_NAME=Scribly

ADMIN_EMAIL=your-admin@example.com

FILESYSTEM_DISK=local

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
LOG_CHANNEL=single
LOG_LEVEL=error
```

**Replace:**
- `YOUR_APP_KEY_HERE` - from your local `.env` (the `base64:...` part)
- `YOUR_DB_PASSWORD` - the password you set for the MySQL user
- `your-mail-server.com` - your mail server (Cloud86 provides SMTP)
- `YOUR_EMAIL_PASSWORD` - your email password
- `your-admin@example.com` - where to send lead notifications

### Step 7: Set File Permissions

Via SSH (if available):
```bash
cd ~/scribly
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod 644 .env
```

Via cPanel File Manager:
1. Right-click `storage/` → Properties → Change Permissions to `755`
2. Right-click `bootstrap/cache/` → Properties → Change Permissions to `755`

### Step 8: Create php.ini for Upload Limits

Create file `/home/username/scribly/public/php.ini`:

```ini
upload_max_filesize = 15M
post_max_size = 35M
memory_limit = 256M
max_execution_time = 60
```

Or in the root `/home/username/scribly/php.ini` if Cloud86 supports it.

### Step 9: Run Database Migration

**Option A: Via SSH (if available)**
```bash
cd ~/scribly
php artisan migrate --force
```

**Option B: Via cPanel Terminal**
Same commands as above.

**Option C: One-time PHP script (if no SSH)**

Create `/home/username/scribly/public/migrate.php`:

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->call('migrate', ['--force' => true]);
exit($status);
?>
```

Then visit `https://scribly.nl/migrate.php` once in your browser. **DELETE THIS FILE IMMEDIATELY AFTER** via cPanel File Manager.

### Step 10: Verify Installation

Visit `https://scribly.nl` and check:
- [ ] Homepage loads (dark navy hero section)
- [ ] All sections visible (benefits, pricing, form)
- [ ] No styling issues (Tailwind CDN should work)
- [ ] Form loads without errors

### Step 11: Test Form Submission

1. Fill in the form with test data
2. Upload two small CSV test files
3. Submit form
4. Check:
   - [ ] Files appear in `storage/app/uploads/` via cPanel File Manager
   - [ ] Lead record in database (via phpMyAdmin in cPanel)
   - [ ] Admin email received

---

## Mail Configuration on Cloud86

Cloud86 typically provides mail service. Configure in `.env`:

```ini
MAIL_MAILER=smtp
MAIL_HOST=mail.cloud86.nl  # or your actual mail server
MAIL_PORT=587
MAIL_USERNAME=info@your-domain.nl
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@your-domain.nl
MAIL_FROM_NAME=Scribly
```

**Note:** The exact mail server depends on your Cloud86 plan. Contact their support if unsure.

Fallback: If SMTP fails, Laravel will use PHP's native `mail()` function (usually works on shared hosting).

---

## Database Access in cPanel

To manage your leads:

1. cPanel → phpMyAdmin
2. Select database `scribly_db`
3. Table `leads` contains all submissions
4. View/export as needed

---

## Important: Shared Hosting Limitations

This setup is optimized for Cloud86 shared hosting:

- **No queue workers** — form submissions process synchronously
- **No Redis** — uses file cache
- **No Artisan scheduler** — future automation would need cron jobs
- **SQLite not suitable** — use MySQL in production
- **No SSH required** — everything can be done via cPanel

---

## Troubleshooting

### Blank white page?

1. Check error logs: `storage/logs/laravel.log` (view via cPanel File Manager)
2. Enable debug mode temporarily in `.env`: `APP_DEBUG=true`
3. Check file permissions on `storage/` and `bootstrap/cache/`

### Database connection error?

1. Verify `.env` DB credentials match cPanel MySQL settings
2. Ensure MySQL user has ALL PRIVILEGES on the database
3. Check if localhost is correct (sometimes use `127.0.0.1`)

### Form not submitting?

1. Check if `storage/` directory is writable
2. Verify `.env` ADMIN_EMAIL is set
3. Check mail logs if email fails silently
4. Ensure both file upload fields are filled (both required)

### Files not uploading?

1. Check `upload_max_filesize` and `post_max_size` in php.ini
2. Verify `storage/app/uploads/` directory exists and is writable
3. Check file types (only CSV, XLSX, XLS, TXT allowed)

### Styles not loading (no colors/fonts)?

1. Check browser console for CDN errors
2. Verify Tailwind CDN link is accessible: `https://cdn.tailwindcss.com`
3. Verify Google Fonts is accessible (sometimes blocked in certain regions)

---

## Future Enhancements

Once live, consider:

1. **Admin Dashboard** — view and manage leads
2. **Email Verification** — before processing files
3. **API Integration** — connect to external services
4. **Scheduled Jobs** — use cron to process leads in background
5. **Payment Integration** — Stripe/Mollie for pricing tiers
6. **User Accounts** — track usage per customer

---

## Support

- **Laravel Docs:** https://laravel.com/docs
- **Cloud86 Support:** Contact your hosting provider
- **Tailwind Docs:** https://tailwindcss.com/docs

---

**Last Updated:** April 2, 2026
**Version:** 1.0.0
