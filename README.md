# web-demo

## GreenLoop Bottle Market

PHP website concept for a plastic bottle purchasing business. The site presents a seller platform where customers can download an app, record bottle quantities, estimate value, and request pickup.

## Structure

```text
index.php
.htaccess
assets/
  css/main.css
  js/main.js
  images/
includes/
  header.php
  footer.php
  navbar.php
  config.php
pages/
  home/index.php
  about/index.php
  contact/index.php
  products/index.php
  404/index.php
controllers/
  route.php
```

## Run locally

This project requires PHP:

```bash
php -S 127.0.0.1:4173
```

Then open:

```text
http://127.0.0.1:4173
```

GitHub Pages does not execute PHP. Use a PHP-enabled host for production, or convert the pages to static HTML for GitHub Pages.
