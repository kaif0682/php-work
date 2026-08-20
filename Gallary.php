<?php
declare(strict_types=1);

require __DIR__ . '/includes/site-data.php';

$featuredWork = [
    [
        'service' => 'Carpet Cleaning',
        'location' => 'Parramatta',
        'result' => 'Freshened lounge carpets with a brighter finish and cleaner traffic lanes.',
        'before' => 'Dull fibres, tracked-in dirt, and visible traffic marks.',
        'after' => 'Lifted pile, reduced staining, and a cleaner overall look.',
    ],
    [
        'service' => 'End of Lease Cleaning',
        'location' => 'Liverpool',
        'result' => 'Detailed vacate clean prepared the property for final inspection.',
        'before' => 'Kitchen grease, bathroom buildup, and dust on trims.',
        'after' => 'Polished surfaces, scrubbed wet areas, and a move-out ready finish.',
    ],
    [
        'service' => 'Window Cleaning',
        'location' => 'Sydney CBD',
        'result' => 'Glass, frames, and tracks cleaned for a brighter office outlook.',
        'before' => 'Smears, dust on the frames, and cloudy glass edges.',
        'after' => 'Clear glass, crisp frames, and streak-free panels.',
    ],
    [
        'service' => 'Oven Cleaning',
        'location' => 'Blacktown',
        'result' => 'Grease and baked-on residue removed from a heavily used family oven.',
        'before' => 'Built-up carbon, grease splatter, and dark oven racks.',
        'after' => 'Degreased cavity, cleaner racks, and a refreshed cooking space.',
    ],
    [
        'service' => 'High Pressure Cleaning',
        'location' => 'Penrith',
        'result' => 'Driveway and path surfaces restored with a brighter, cleaner finish.',
        'before' => 'Outdoor grime, mossy patches, and weather staining.',
        'after' => 'Washed concrete, cleaner edges, and improved kerb appeal.',
    ],
    [
        'service' => 'Gutter Cleaning',
        'location' => 'Hills District',
        'result' => 'Debris removed to help water flow properly through the drainage system.',
        'before' => 'Leaves, silt, and blocked downpipe sections.',
        'after' => 'Cleared gutters, checked outlets, and tidy roofline channels.',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | GreenSpark Cleaning</title>
    <meta name="description" content="Browse recent cleaning work and before-after style project highlights from GreenSpark Cleaning.">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <div class="container topbar-inner">
            <span>Recent work gallery</span>
            <div class="topbar-links">
                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
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

    <main>
        <section class="gallery-hero section">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">Our work</p>
                    <h1>See the kind of results clients can expect.</h1>
                    <p class="lead">
                        This gallery page is set up to showcase finished jobs, before-and-after highlights,
                        and the kind of detail that helps new clients trust the team before they book.
                    </p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="index.php#quote">Book a clean</a>
                        <a class="button button-secondary" href="services.php">Browse services</a>
                    </div>
                    <div class="hero-stats">
                        <div><strong>120+</strong><span>projects showcased</span></div>
                        <div><strong>6</strong><span>popular job types</span></div>
                        <div><strong>24h</strong><span>quote turnaround</span></div>
                    </div>
                </div>
                <div class="hero-panel">
                    <div class="panel-card panel-highlight">
                        <span class="panel-tag">Client proof</span>
                        <h2>Real work, presented clearly</h2>
                        <p>Use this space for your best finished jobs, inspection wins, and transformation shots.</p>
                        <ul>
                            <li>Before and after results</li>
                            <li>Residential and commercial work</li>
                            <li>Fast scan for new visitors</li>
                        </ul>
                    </div>
                    <div class="panel-card">
                        <span class="panel-tag">Gallery note</span>
                        <p class="panel-count">Add your own photos anytime</p>
                        <small>Replace these sample work panels with real job images when you are ready.</small>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-alt">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Featured work</p>
                    <h2>Selected jobs across the services you offer.</h2>
                </div>
                <div class="gallery-grid">
                    <?php foreach ($featuredWork as $work): ?>
                        <article class="gallery-card">
                            <div class="work-visual">
                                <div class="work-side before">
                                    <div>
                                        <span class="work-label">Before</span>
                                        <h3><?= e($work['service']) ?></h3>
                                        <p><?= e($work['before']) ?></p>
                                    </div>
                                </div>
                                <div class="work-side after">
                                    <div>
                                        <span class="work-label">After</span>
                                        <h3><?= e($work['location']) ?></h3>
                                        <p><?= e($work['after']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="work-meta">
                                    <span><?= e($work['service']) ?></span>
                                    <span><?= e($work['location']) ?></span>
                                </div>
                                <p><?= e($work['result']) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Why it helps</p>
                    <h2>Let new clients see the quality before they book.</h2>
                </div>
                <div class="gallery-summary">
                    <article>
                        <h3>Build trust fast</h3>
                        <p>Showing real results gives visitors a clear idea of the standard you deliver on each job.</p>
                    </article>
                    <article>
                        <h3>Highlight specialty work</h3>
                        <p>Show off end of lease, pressure cleaning, oven cleans, and other jobs that are hard to explain in text alone.</p>
                    </article>
                    <article>
                        <h3>Turn views into quotes</h3>
                        <p>Pair the gallery with a simple quote button so people can move from browsing to booking with less friction.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section-alt">
            <div class="container quote-grid">
                <div>
                    <p class="eyebrow">Ready to book</p>
                    <h2>Want results like these at your property?</h2>
                    <p>Send through the job details and we will put together a clean, simple quote.</p>
                </div>
                <div class="hero-actions">
                    <a class="button button-primary" href="index.php#quote">Request quote</a>
                    <a class="button button-secondary" href="services.php">View all services</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
