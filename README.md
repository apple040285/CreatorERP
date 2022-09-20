# 本地電腦開發教學 `(務必閱讀)`
```
1. 安裝
composer install

2. 設定 .env
cp .env.example .env

3. 產生網站密鑰
php artisan key:generate

4. 設定 .env 資料庫連線
DB_DATABASE=creatorerp
DB_USERNAME=root
DB_PASSWORD=

5. 設定 .env 網址網域
APP_URL=http://localhost

6. 執行一鍵安裝
php artisan erp:install

7. 啟動內建伺服器
php artisan serve
```

# 套件說明


```
搜尋套件 必須是 5.0 版本, 因 5.1 fix 修正導致 search where 異常
composer require yab/laravel-scout-mysql-driver:5.0
```
