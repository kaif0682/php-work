<?php
declare(strict_types=1);

require __DIR__ . '/includes/site-data.php';

$countries = site_countries();
$countryCode = selected_country_code();
$country = $countries[$countryCode];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | GreenSpark Cleaning</title>
    <meta name="description" content="Browse all cleaning service pages with pricing by country.">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <div class="container topbar-inner">
            <span><?= e($country['label']) ?> service directory</span>
            <div class="topbar-links">
                <a href="index.php">Home</a>
                <a href="index.php#quote">Request quote</a>
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
                <a href="index.php#about">About</a>
                <a href="Gallary.php">Gallery</a>
                <a href="index.php#quote">Get Quote</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="section">
            <div class="container">
                <p class="eyebrow">Services</p>
                <h1 class="page-title">Cleaning service pages with prices by country.</h1>
                <p class="lead">Pick a service below to open a dedicated detail page. Each page shows a country-specific starting price guide.</p>
                <div class="country-row">
                    <?php foreach ($countries as $code => $entry): ?>
                        <a class="country-chip<?= $code === $countryCode ? ' active' : '' ?>" href="?country=<?= e($code) ?>"><?= e($entry['label']) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section section-alt">
            <div class="container service-index">
                <?php foreach (site_services() as $slug => $service): ?>
                    <a class="service-index-card" href="<?= e($service['filename']) ?>?country=<?= e($countryCode) ?>">
                        <strong><?= e($service['name']) ?></strong>
                        <span><?= e($service['summary']) ?></span>
                        <em>From <?= e(service_price_label($service, $countryCode)) ?></em>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
