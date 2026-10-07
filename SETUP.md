# Student Setup Guide

How to clone this repo, run it locally, and push it to **your own** GitHub repository.

## 1. Clone the repo

```sh
git clone https://github.com/RalfHei/tak25-orm.git
cd tak25-orm
```

## 2. Point it at your own GitHub repo

1. On GitHub, create a new **empty** repository (no README, no .gitignore, no license), e.g. `tak25-orm`.
2. Replace the remote so pushes go to your repo instead of the original:

```sh
git remote rename origin upstream
git remote add origin https://github.com/<your-username>/tak25-orm.git
git push -u origin master
```

Check with `git remote -v`:
- `origin` → your repo (you push here)
- `upstream` → teacher's repo (pull new changes from here)

To get later updates from the teacher:

```sh
git pull upstream master
```

> Don't want the teacher's history? Instead of the steps above, run `rm -rf .git && git init`, then commit and add your remote.

## 3. Install and run the app

Requires PHP 8.3+, Composer and Node.js.

```sh
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
```

Start it:

```sh
composer run dev
```

Or, in two terminals: `php artisan serve` and `npm run dev`. Open http://localhost:8000.

## 4. Commit and push your work

```sh
git add .
git commit -m "Describe your change"
git push
```

## Notes

- `.env`, `vendor/` and `node_modules/` are git-ignored — never commit them.
- If you get a "database does not exist" error, make sure `database/database.sqlite` exists and rerun `php artisan migrate --seed`.
