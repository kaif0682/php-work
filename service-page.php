<?php
declare(strict_types=1);

require __DIR__ . '/includes/site-data.php';

$slug = $serviceSlug ?? '';
$service = find_service($slug);

if (!$service) {
    http_response_code(404);
    $pageTitle = 'Service not found';
    $pageDescription = 'The requested cleaning service page could not be found.';
} else {
    $pageTitle = $service['name'] . ' | GreenSpark Cleaning';
    $pageDescription = $service['summary'];
}

$countries = site_countries();
$countryCode = selected_country_code();
$country = $countries[$countryCode];

if (!$service) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= e($pageTitle) ?></title>
        <meta name="description" content="<?= e($pageDescription) ?>">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main class="service-shell">
            <div class="container service-hero">
                <p class="eyebrow">Service page</p>
                <h1>Service not found</h1>
                <p class="lead">The page you requested does not exist.</p>
                <a class="button button-primary" href="services.php">Back to services</a>
            </div>
        </main>
    </body>
    </html>
    <?php
    return;
}

$links = [];
foreach (site_countries() as $code => $entry) {
    $links[] = '<a class="country-chip' . ($code === $countryCode ? ' active' : '') . '" href="?country=' . e($code) . '">' . e($entry['label']) . '</a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <div class="container topbar-inner">
            <span><?= e($country['label']) ?> service pricing</span>
            <div class="topbar-links">
                <a href="services.php">All services</a>
                <a href="index.php#quote">Request a quote</a>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container nav">
            <a class="brand" href="index.php">
                <span class="brand-mark">GS</span>
                <span>
                    <strong>GreenSpark</strong>
                    <small>Cleaning Services</small>
                </span>
            </a>
            <nav class="menu menu-static">
                <a href="services.php">Services</a>
                <a href="Gallary.php">Gallery</a>
                <a href="index.php#quote">Get Quote</a>
            </nav>
        </div>
    </header>

    <main class="service-page">
        <section class="service-hero section">
            <div class="container service-grid">
                <div>
                    <p class="eyebrow">Cleaning service</p>
                    <h1><?= e($service['name']) ?></h1>
                    <p class="lead"><?= e($service['intro']) ?></p>
                    <div class="country-row">
                        <?= implode('', $links) ?>
                    </div>
                    <div class="hero-actions">
                        <a class="button button-primary" href="index.php#quote">Book now</a>
                        <a class="button button-secondary" href="services.php">View all services</a>
                    </div>
                </div>
                <aside class="price-panel">
                    <span class="panel-tag">Price guide</span>
                    <h2><?= e(service_price_label($service, $countryCode)) ?></h2>
                    <p>Estimated starting price in <?= e($country['label']) ?>.</p>
                    <ul>
                        <li>Typical duration: <?= e($service['duration']) ?></li>
                        <li>Best for: <?= e($service['ideal_for']) ?></li>
                        <li>Location: <?= e($country['label']) ?></li>
                    </ul>
                </aside>
            </div>
        </section>

        <section class="section">
            <div class="container two-col">
                <article class="info-card">
                    <p class="eyebrow">What's included</p>
                    <div class="check-list">
                        <?php foreach ($service['includes'] as $item): ?>
                            <div><?= e($item) ?></div>
                        <?php endforeach; ?>
                    </div>
                </article>
                <article class="info-card">
                    <p class="eyebrow">Service summary</p>
                    <p><?= e($service['summary']) ?></p>
                    <p>We can tailor the scope for homes, rentals, offices, and commercial spaces.</p>
                </article>
            </div>
        </section>

        <section class="section section-alt">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Related services</p>
                    <h2>More cleaning pages</h2>
                </div>
                <div class="service-links">
                    <?php foreach (site_services() as $slugKey => $entry): ?>
                        <?php if ($slugKey === $slug) { continue; } ?>
                        <a href="<?= e($entry['filename']) ?>?country=<?= e($countryCode) ?>" class="service-link">
                            <strong><?= e($entry['name']) ?></strong>
                            <span><?= e($entry['summary']) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
