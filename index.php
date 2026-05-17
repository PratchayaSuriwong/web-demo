<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/controllers/route.php';

$currentPage = resolve_route($_GET['page'] ?? 'home');
$pageTitle = $routes[$currentPage]['title'] ?? SITE_NAME;
$pageDescription = $routes[$currentPage]['description'] ?? SITE_DESCRIPTION;
$pageFile = $routes[$currentPage]['file'] ?? $routes['404']['file'];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/navbar.php';
require $pageFile;
require __DIR__ . '/includes/footer.php';
