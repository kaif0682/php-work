<?php
declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function site_countries(): array
{
    return [
        'au' => ['label' => 'Australia', 'currency' => 'AUD'],
        'us' => ['label' => 'United States', 'currency' => 'USD'],
        'uk' => ['label' => 'United Kingdom', 'currency' => 'GBP'],
        'ca' => ['label' => 'Canada', 'currency' => 'CAD'],
        'nz' => ['label' => 'New Zealand', 'currency' => 'NZD'],
    ];
}

function site_services(): array
{
    return [
        'upholstery-cleaning' => [
            'name' => 'Upholstery Cleaning',
            'filename' => 'Upholstery-cleaning-service.php',
            'summary' => 'Professional sofa, lounge, and fabric care for homes and rentals.',
            'intro' => 'Lift everyday dirt, stains, and odours from chairs, sofas, and soft furnishings.',
            'from' => ['au' => 120, 'us' => 95, 'uk' => 85, 'ca' => 110, 'nz' => 130],
            'duration' => '1 to 2 hours',
            'ideal_for' => 'Fabric sofas, armchairs, and sectional lounges',
            'includes' => ['Pre-inspection', 'Spot treatment', 'Deep extraction', 'Fast drying'],
        ],
        'end-of-lease-cleaning' => [
            'name' => 'End of Lease Cleaning',
            'filename' => 'Endoflease-cleaning-service.php',
            'summary' => 'Detailed vacate cleaning to help homes present well for inspections.',
            'intro' => 'Cover kitchens, bathrooms, floors, skirting, and other move-out essentials.',
            'from' => ['au' => 280, 'us' => 240, 'uk' => 210, 'ca' => 260, 'nz' => 300],
            'duration' => '3 to 6 hours',
            'ideal_for' => 'Tenancy handovers and final inspections',
            'includes' => ['Kitchen detailing', 'Bathroom scrub', 'Floor cleaning', 'Window wipe-down'],
        ],
        'carpet-cleaning' => [
            'name' => 'Carpet Cleaning',
            'filename' => 'Carpet-cleaning-service.php',
            'summary' => 'Steam and extraction cleaning for fresh, healthier carpets.',
            'intro' => 'Remove dust, stains, and trapped debris from high-traffic carpeted areas.',
            'from' => ['au' => 99, 'us' => 85, 'uk' => 75, 'ca' => 95, 'nz' => 110],
            'duration' => '30 to 90 minutes',
            'ideal_for' => 'Bedrooms, hallways, offices, and rental properties',
            'includes' => ['Vacuum pre-clean', 'Hot water extraction', 'Edge detailing', 'Deodorising'],
        ],
        'mould-cleaning' => [
            'name' => 'Mould Cleaning',
            'filename' => 'Mould-cleaning-service.php',
            'summary' => 'Targeted cleaning for mould-affected surfaces and problem areas.',
            'intro' => 'Treat visible mould on walls, ceilings, bathroom grout, and damp spaces.',
            'from' => ['au' => 160, 'us' => 140, 'uk' => 120, 'ca' => 150, 'nz' => 170],
            'duration' => '2 to 4 hours',
            'ideal_for' => 'Bathrooms, laundries, and moisture-prone rooms',
            'includes' => ['Safety prep', 'Mould treatment', 'Surface cleaning', 'Aftercare advice'],
        ],
        'mattress-cleaning' => [
            'name' => 'Mattress Cleaning',
            'filename' => 'Mattress-cleaning-service.php',
            'summary' => 'Deep cleaning for mattresses, helping reduce dust and allergens.',
            'intro' => 'Freshen sleeping surfaces with stain treatment and extraction cleaning.',
            'from' => ['au' => 110, 'us' => 90, 'uk' => 80, 'ca' => 100, 'nz' => 120],
            'duration' => '45 to 75 minutes',
            'ideal_for' => 'Single, double, queen, and king mattresses',
            'includes' => ['Vacuuming', 'Stain pre-treatment', 'Extraction', 'Drying guidance'],
        ],
        'rug-cleaning' => [
            'name' => 'Rug Cleaning',
            'filename' => 'Rug-cleaning-service.php',
            'summary' => 'Gentle rug washing and stain care for decorative and area rugs.',
            'intro' => 'Clean delicate rugs safely while protecting texture and color.',
            'from' => ['au' => 95, 'us' => 80, 'uk' => 70, 'ca' => 90, 'nz' => 105],
            'duration' => '45 to 90 minutes',
            'ideal_for' => 'Wool, synthetic, and living-room rugs',
            'includes' => ['Fiber check', 'Pre-spotting', 'Deep wash', 'Rinse and groom'],
        ],
        'oven-cleaning' => [
            'name' => 'Oven Cleaning',
            'filename' => 'Oven-cleaning-service.php',
            'summary' => 'Grease removal and oven detailing for a fresher cooking space.',
            'intro' => 'Restore ovens, racks, and trays with careful degreasing and polish.',
            'from' => ['au' => 130, 'us' => 110, 'uk' => 95, 'ca' => 125, 'nz' => 140],
            'duration' => '1 to 2 hours',
            'ideal_for' => 'Standard ovens, wall ovens, and electric units',
            'includes' => ['Racks removal', 'Degreasing', 'Interior scrub', 'Glass polish'],
        ],
        'lawn-mowing' => [
            'name' => 'Lawn Mowing',
            'filename' => 'Lawn-moving-service.php',
            'summary' => 'Quick grass cutting and outdoor tidy-up for neat kerb appeal.',
            'intro' => 'Keep the yard clean with mowing, edge work, and clippings removal.',
            'from' => ['au' => 75, 'us' => 60, 'uk' => 55, 'ca' => 70, 'nz' => 80],
            'duration' => '30 to 60 minutes',
            'ideal_for' => 'Small to medium residential lawns',
            'includes' => ['Mowing', 'Edging', 'Clipping tidy-up', 'Path blowing'],
        ],
        'high-pressure-cleaning' => [
            'name' => 'High Pressure Cleaning',
            'filename' => 'High-pressure-cleaning-service.php',
            'summary' => 'Pressure washing for driveways, paths, patios, and outdoor surfaces.',
            'intro' => 'Blast away built-up grime from hard surfaces with controlled pressure cleaning.',
            'from' => ['au' => 140, 'us' => 120, 'uk' => 105, 'ca' => 135, 'nz' => 150],
            'duration' => '1 to 3 hours',
            'ideal_for' => 'Driveways, concrete, patios, and pavers',
            'includes' => ['Surface prep', 'Pressure wash', 'Stain pass', 'Rinse-down'],
        ],
        'window-cleaning' => [
            'name' => 'Window Cleaning',
            'filename' => 'Window-cleaning-service.php',
            'summary' => 'Clear internal and external windows for brighter spaces.',
            'intro' => 'Clean glass, tracks, and frames with a streak-free finish.',
            'from' => ['au' => 90, 'us' => 75, 'uk' => 65, 'ca' => 85, 'nz' => 100],
            'duration' => '45 to 120 minutes',
            'ideal_for' => 'Homes, offices, shopfronts, and apartments',
            'includes' => ['Glass wipe', 'Frame clean', 'Track clean', 'Final polish'],
        ],
        'tile-grout-cleaning' => [
            'name' => 'Tile and Grout Cleaning',
            'filename' => 'Tile-grout-cleaning-service.php',
            'summary' => 'Restore tiled floors and grout lines with detailed scrubbing.',
            'intro' => 'Brighten bathrooms, kitchens, and tiled areas with deep grout care.',
            'from' => ['au' => 150, 'us' => 130, 'uk' => 115, 'ca' => 140, 'nz' => 160],
            'duration' => '1 to 3 hours',
            'ideal_for' => 'Bathrooms, kitchens, and tiled hallways',
            'includes' => ['Pre-soak', 'Grout treatment', 'Tile scrub', 'Surface rinse'],
        ],
        'bbq-cleaning' => [
            'name' => 'BBQ Cleaning',
            'filename' => 'BBQ-cleaning-service.php',
            'summary' => 'Thorough barbecue and grill cleaning for outdoor cooking gear.',
            'intro' => 'Remove grease, soot, and built-up residue from BBQ surfaces and trays.',
            'from' => ['au' => 115, 'us' => 95, 'uk' => 85, 'ca' => 105, 'nz' => 125],
            'duration' => '45 to 90 minutes',
            'ideal_for' => 'Built-in and portable barbecue units',
            'includes' => ['Degreasing', 'Grill scrub', 'Interior clean', 'Exterior polish'],
        ],
        'gutter-cleaning' => [
            'name' => 'Gutter Cleaning',
            'filename' => 'Gutter-cleaning-service.php',
            'summary' => 'Safe gutter clearing to help protect roofs and drainage.',
            'intro' => 'Remove leaves and debris so gutters can flow properly again.',
            'from' => ['au' => 180, 'us' => 155, 'uk' => 140, 'ca' => 170, 'nz' => 190],
            'duration' => '1 to 3 hours',
            'ideal_for' => 'Residential roofs and low-rise buildings',
            'includes' => ['Debris removal', 'Downpipe check', 'Flush test', 'Photo report'],
        ],
        'house-cleaning' => [
            'name' => 'House Cleaning',
            'filename' => 'House-cleaning-service.php',
            'summary' => 'Routine house cleaning for kitchens, bathrooms, floors, and dusting.',
            'intro' => 'Keep the home tidy with a flexible clean built around your weekly routine.',
            'from' => ['au' => 110, 'us' => 95, 'uk' => 85, 'ca' => 100, 'nz' => 120],
            'duration' => '1 to 3 hours',
            'ideal_for' => 'Regular home maintenance cleans',
            'includes' => ['Kitchen surfaces', 'Bathroom clean', 'Floor care', 'General dusting'],
        ],
        'office-cleaning' => [
            'name' => 'Office Cleaning',
            'filename' => 'Office-cleaning-service.php',
            'summary' => 'Reliable workplace cleaning for desks, common areas, and washrooms.',
            'intro' => 'Support a neat, productive workspace with scheduled office cleaning.',
            'from' => ['au' => 125, 'us' => 105, 'uk' => 95, 'ca' => 115, 'nz' => 135],
            'duration' => '1 to 4 hours',
            'ideal_for' => 'Small offices, suites, and shared workplaces',
            'includes' => ['Desk wipe-down', 'Bin emptying', 'Kitchen area', 'Bathroom tidy'],
        ],
    ];
}

function find_service(string $slug): ?array
{
    $services = site_services();
    return $services[$slug] ?? null;
}

function selected_country_code(): string
{
    $code = strtolower((string)($_GET['country'] ?? 'au'));
    $countries = site_countries();
    return array_key_exists($code, $countries) ? $code : 'au';
}

function service_price_label(array $service, string $countryCode): string
{
    $countries = site_countries();
    $country = $countries[$countryCode] ?? $countries['au'];
    $price = $service['from'][$countryCode] ?? $service['from']['au'];
    return number_format((float)$price, 0) . ' ' . $country['currency'];
}
