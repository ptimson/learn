# Tutorial 01 - Local Setup & PHP Structure

## Setting up Local Environment
This setup guide is Mac specific but will be similar for Unix environments.

## Editor
Recommended text editors
Atom - https://atom.io/  
Sublime - https://www.sublimetext.com/

The Emmet Plugin (for either Editor) - very useful for HTML

## Local Hosts
To point a web address to your local machine.

```sh
# Edit hosts file
sudo vi /etc/hosts

# Append new domain
127.0.0.1       mydomain.dev
```

## Creating Virtual Host
To route domain to directory

```sh
# Edit VHost file
sudo vi /etc/apache2/extra/httpd-vhosts.conf

# Append new virtual host
<VirtualHost *>
    ServerName mydomain.dev
    DocumentRoot /Users/username/websites/mydomain
    <Directory "/Users/username/websites/mydomain">
        AllowOverride All
        Options FollowSymLinks Multiviews Indexes
        Require all granted
    </Directory>
</VirtualHost>

# Restart Apache
sudo apachectl restart
```

## Route All to index.php
Add .htaccess file to your domain folder `/Users/username/websites/mydomain`

```sh
# .htaccess
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteCond $1 !^(index\.php|robots\.txt|favicon\.ico|assets|css|js)
  RewriteRule ^(.*)$ /index.php/$1 [L]
</IfModule>
```

If `.htaccess` does not work uncomment the following lines in Apache config to Load rewrite modules (Remove `#`).

```sh
# Edit Apache2 Config
sudo vi /etc/apache2/httpd.conf

# Uncomment these lines
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
LoadModule php5_module libexec/apache2/libphp5.so

# Restart Apache
sudo apachectl restart
```

## Setting up a custom 404 page
Append the following to your .htaccess after `</IfModule>` on a new line

```sh
ErrorDocument 404 /views/404.php
```

## Typical Structure
There are 1,000,001 (a million and one) ways to structure your site. Best approach is to use an MVC framework such as Laravel but for a simple site this is fine.

```
site/
  .htaccess
  index.php
  views/
    header.php
    footer.php
    home.php
    about.php
  css/
    style.css
  js/
    main.js
  lib/
    functions.php
```
