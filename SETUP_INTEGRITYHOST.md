# IntegrityHost Deployment Setup

## 🔧 Configure GitHub Secrets

You need to add these secrets to your GitHub repository:

1. Go to: https://github.com/jslnwsky/minutesofthunder/settings/secrets/actions
2. Click "New repository secret" for each:

### Required Secrets

| Secret Name | Value | Description |
|-------------|-------|-------------|
| `FTP_HOST` | `ftp.minutesofthunder.com` | Your FTP server address |
| `FTP_USER` | `your-ftp-username` | Your FTP username |
| `FTP_PASSWORD` | `your-ftp-password` | Your FTP password |
| `FTP_PATH` | `/public_html/` | Path to web directory (optional) |

## 🚀 How It Works

1. **Push to GitHub** → Triggers workflow
2. **FTP Deploy** → Uploads files to IntegrityHost
3. **Excludes** → historical/, .git/, .github/
4. **Live Site** → Updates automatically

## 📁 Files That Will Be Deployed

```
minutesofthunder/
├── index.html              # ✅ Modern homepage
├── article-template.html   # ✅ Article template
├── css/
│   └── modern-styles.css  # ✅ Custom styles
└── [other web files]       # ✅ Any future additions
```

## 🚫 Files That Will NOT Be Deployed

- `historical/` - Legacy files (git ignored)
- `.git/` - Git repository files
- `.github/` - Workflow files
- `.gitignore` - Git ignore rules
- `README.md` - Documentation

## 🔄 Automatic Updates

After setup, every push to main branch will automatically deploy:

```bash
git add .
git commit -m "Update homepage with new RC car article"
git push origin main
```

**Result**: Website updates in 1-2 minutes!

## 🌐 Your Live Website

After deployment, your site will be at:
- **https://minutesofthunder.com** (your domain)
- **https://www.minutesofthunder.com** (with www)

## 🛠️ Troubleshooting

### If Deployment Fails
1. Check GitHub Actions tab for error details
2. Verify FTP credentials are correct
3. Ensure FTP path is accessible
4. Check file permissions on server

### Manual FTP Test
Test FTP connection manually:
```bash
ftp ftp.minutesofthunder.com
# Enter username and password
# Test uploading a small file
```

## 📞 Support

- **IntegrityHost**: Your hosting provider support
- **GitHub Actions**: https://github.com/jslnwsky/minutesofthunder/actions

---

**Once secrets are configured, your first automatic deployment will begin on next push!** 🏁
