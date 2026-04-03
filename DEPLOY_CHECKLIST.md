# Scribly - Deployment Checklist

## Pre-Deployment (Local)

- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Test form locally: `php artisan serve`
- [ ] Verify no console errors
- [ ] Verify no database errors
- [ ] Create production `.env` with real credentials
- [ ] Generate clean project archive

## Cloud86 Setup

### Database
- [ ] Create MySQL database via cPanel (e.g., `scribly_db`)
- [ ] Create MySQL user (e.g., `scribly_user`)
- [ ] Grant ALL PRIVILEGES to user on database
- [ ] Note credentials for `.env`

### File Upload
- [ ] Upload files to `/home/username/scribly/` directory
- [ ] NOT directly to `public_html`

### Configuration
- [ ] Configure domain Document Root: `/home/username/scribly/public`
- [ ] Create `.env` file in `/scribly/` root
- [ ] Update `.env` with:
  - [ ] `APP_KEY` (from local `.env`)
  - [ ] `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
  - [ ] `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`
  - [ ] `ADMIN_EMAIL`

### Permissions
- [ ] `chmod 755 storage/` (via File Manager or SSH)
- [ ] `chmod 755 bootstrap/cache/`
- [ ] `chmod 644 .env`

### PHP Configuration
- [ ] Create `public/php.ini` with:
  - `upload_max_filesize = 15M`
  - `post_max_size = 35M`
  - `memory_limit = 256M`

### Database Migration
- [ ] Run: `php artisan migrate --force` (via SSH or cPanel Terminal)
- [ ] Verify no errors

## Post-Deployment

### Testing
- [ ] Visit `https://scribly.nl` in browser
- [ ] Check hero section loads (dark navy background)
- [ ] Scroll through all sections (no styling issues)
- [ ] Verify fonts load correctly (Barlow Condensed for titles)
- [ ] Open form section
- [ ] Submit test form with CSV files
- [ ] Check admin email for notification
- [ ] Verify files in `storage/app/uploads/` directory
- [ ] Check database: lead record created

### Monitoring
- [ ] Check error logs: `storage/logs/laravel.log`
- [ ] Monitor server resources in cPanel
- [ ] Test mail delivery (sometimes delayed on shared hosting)

## Security
- [ ] Delete any temporary migration scripts (`public/migrate.php`, etc.)
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Verify `.env` is NOT publicly accessible
- [ ] Test file upload restrictions (should only allow CSV, XLSX, XLS, TXT)

## Go-Live
- [ ] Update DNS to point to Cloud86 server (if not done)
- [ ] Set up SSL certificate (usually auto via cPanel AutoSSL)
- [ ] Update Google Search Console
- [ ] Update any marketing links
- [ ] Announce availability

## Post-Launch Monitoring
- [ ] Monitor error logs daily for first week
- [ ] Check lead submissions flowing in
- [ ] Verify emails are being sent
- [ ] Monitor server CPU/memory usage
- [ ] Plan for scaling if needed (higher plan, API, etc.)

---

## Quick Start Reference

```bash
# Local testing
php artisan serve

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# On Cloud86 (via SSH or cPanel Terminal)
cd ~/scribly
php artisan migrate --force

# Test form submission with real database
# Visit https://scribly.nl and use the contact form
```

## Troubleshooting During Deployment

| Issue | Solution |
|-------|----------|
| Blank page | Check `storage/logs/laravel.log` for errors |
| Database error | Verify MySQL credentials in `.env` match cPanel |
| File upload fails | Check `upload_max_filesize` in `php.ini` |
| Styling broken | Verify Tailwind CDN loads (no adblocker blocking) |
| Email not sent | Verify SMTP credentials, check logs |
| Files not saving | Ensure `storage/` has write permissions |

---

**Estimated Time:** 30-45 minutes

**Last Updated:** April 2, 2026
