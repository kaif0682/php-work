<?php
declare(strict_types=1);

session_start();

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function normalize(string $value): string
{
    return trim(preg_replace('/\s+/', ' ', $value) ?? '');
}

$defaults = [
    'name' => '',
    'phone' => '',
    'email' => '',
    'service' => 'House Cleaning',
    'address' => '',
    'message' => '',
];

$services = [
    'House Cleaning',
    'Office Cleaning',
    'End of Lease Cleaning',
    'Carpet Cleaning',
    'Upholstery Cleaning',
    'Mould Cleaning',
    'Mattress Cleaning',
    'Rug Cleaning',
    'Oven Cleaning',
    'Lawn Mowing',
    'High Pressure Cleaning',
    'Window Cleaning',
    'Tile and Grout Cleaning',
    'BBQ Cleaning',
    'Gutter Cleaning',
    'Deep Cleaning',
];

$form = $defaults;
$errors = [];
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$storageDir = __DIR__ . DIRECTORY_SEPARATOR . 'data';
$storageFile = $storageDir . DIRECTORY_SEPARATOR . 'leads.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($defaults as $key => $value) {
        $form[$key] = normalize((string)($_POST[$key] ?? $value));
    }

    if ($form['name'] === '') {
        $errors['name'] = 'Please enter your name.';
    }

    if ($form['phone'] === '') {
        $errors['phone'] = 'Please enter your phone number.';
    }

    if ($form['email'] !== '' && !filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if (!in_array($form['service'], $services, true)) {
        $errors['service'] = 'Please choose a service.';
    }

    if ($form['message'] === '') {
        $errors['message'] = 'Please tell us a little about the job.';
    }

    if (!$errors) {
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }

        $entry = [
            'id' => bin2hex(random_bytes(4)),
            'submitted_at' => date('c'),
            'name' => $form['name'],
            'phone' => $form['phone'],
            'email' => $form['email'],
            'service' => $form['service'],
            'address' => $form['address'],
            'message' => $form['message'],
        ];

        $records = [];
        if (is_file($storageFile)) {
            $decoded = json_decode((string)file_get_contents($storageFile), true);
            if (is_array($decoded)) {
                $records = $decoded;
            }
        }

        $records[] = $entry;
        file_put_contents(
            $storageFile,
            json_encode($records, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            LOCK_EX
        );

        $_SESSION['flash'] = 'Thanks, ' . $form['name'] . '. Your quote request has been saved.';
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '#quote');
        exit;
    }
}

$leadCount = 0;
if (is_file($storageFile)) {
    $decoded = json_decode((string)file_get_contents($storageFile), true);
    if (is_array($decoded)) {
        $leadCount = count($decoded);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSpark Cleaning | One-Page PHP Website</title>
    <meta name="description" content="A simple one-page cleaning website with a PHP lead form and local backend storage.">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <div class="container topbar-inner">
            <span>Mon - Sun: 8:00 AM - 5:00 PM</span>
            <div class="topbar-links">
                <a href="tel:+61455584786">+61 455 584 786</a>
                <a href="mailto:hello@greensparkcleaning.com">hello@greensparkcleaning.com</a>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container nav">
            <a class="brand" href="#home">
                <span class="brand-mark">GS</span>
                <span>
                    <strong>GreenSpark</strong>
                    <small>Cleaning Services</small>
                </span>
            </a>
            <input id="nav-toggle" class="nav-toggle" type="checkbox">
            <label class="nav-button" for="nav-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <nav class="menu">
                <a href="services.php">Services</a>
                <a href="#about">About</a>
                <a href="#process">Process</a>
                <a href="#reviews">Reviews</a>
                <a class="menu-cta" href="#quote">Get Quote</a>
            </nav>
        </div>
    </header>

    <main id="home">
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">Trusted residential and commercial cleaning</p>
                    <h1>Simple cleaning services for homes, offices, and move-outs.</h1>
                    <p class="lead">
                        A clean, modern one-page website inspired by high-converting cleaning brands,
                        with a PHP backend that captures quote requests and stores them locally.
                    </p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="#quote">Request a Quote</a>
                        <a class="button button-secondary" href="services.php">See Services</a>
                    </div>
                    <div class="hero-stats">
                        <div><strong>250+</strong><span>jobs completed</span></div>
                        <div><strong>24h</strong><span>fast response</span></div>
                        <div><strong>5 star</strong><span>customer care</span></div>
                    </div>
                </div>
                <div class="hero-panel">
                    <div class="panel-card panel-highlight">
                        <span class="panel-tag">Quick estimate</span>
                        <h2>Tell us what needs cleaning</h2>
                        <p>We'll follow up with a tailored quote and a simple next step.</p>
                        <ul>
                            <li>House cleaning</li>
                            <li>Office cleaning</li>
                            <li>Deep cleaning</li>
                        </ul>
                    </div>
                    <div class="panel-card">
                        <span class="panel-tag">Backend status</span>
                        <p class="panel-count"><?= e((string)$leadCount) ?> leads saved locally</p>
                        <small>Every submitted inquiry is stored in <code>data/leads.json</code>.</small>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="section">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Services</p>
                    <h2>Explore the service pages and country-based pricing.</h2>
                </div>
                <div class="card-grid">
                    <article class="card">
                        <h3>House Cleaning</h3>
                        <p>Regular tidy-ups, kitchens, bathrooms, floors, and dusting for busy households.</p>
                    </article>
                    <article class="card">
                        <h3>Office Cleaning</h3>
                        <p>Reliable after-hours office cleaning for desks, shared spaces, and meeting rooms.</p>
                    </article>
                    <article class="card">
                        <h3>End of Lease</h3>
                        <p>Move-out cleans that help present the property well for final inspection.</p>
                    </article>
                    <article class="card">
                        <h3>Carpet Cleaning</h3>
                        <p>Deep extraction for high-traffic carpets, spills, stains, and everyday buildup.</p>
                    </article>
                    <article class="card">
                        <h3>Window Cleaning</h3>
                        <p>Clear glass and frames that brighten the whole property inside and out.</p>
                    </article>
                    <article class="card">
                        <h3>Deep Cleaning</h3>
                        <p>Detailed top-to-bottom cleaning for spring refreshes and special occasions.</p>
                    </article>
                    <article class="card">
                        <h3>View All Services</h3>
                        <p>Open the full service catalog with dedicated pages for each cleaning type.</p>
                        <a class="button button-secondary" href="services.php">Open catalog</a>
                    </article>
                </div>
            </div>
        </section>

        <section id="about" class="section section-alt">
            <div class="container about-grid">
                <div>
                    <p class="eyebrow">About us</p>
                    <h2>Built for trust, speed, and a clean first impression.</h2>
                    <p>
                        This layout keeps the same kind of high-conversion structure you see on strong
                        cleaning service sites: bold hero, service overview, proof points, and a quote form.
                        It is redesigned from scratch so it feels fresh and fits your own business.
                    </p>
                </div>
                <div class="feature-list">
                    <div>
                        <strong>Eco-friendly products</strong>
                        <span>Safe options for homes, offices, and family spaces.</span>
                    </div>
                    <div>
                        <strong>Flexible scheduling</strong>
                        <span>Morning, evening, and weekend bookings made easy.</span>
                    </div>
                    <div>
                        <strong>Attention to detail</strong>
                        <span>Focused cleaning plans tailored to the property and job type.</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="process" class="section">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">How it works</p>
                    <h2>Three simple steps from enquiry to clean space.</h2>
                </div>
                <div class="steps">
                    <article><span>01</span><h3>Send the request</h3><p>Fill in the form with your service type and job details.</p></article>
                    <article><span>02</span><h3>We review it</h3><p>The backend saves your inquiry and keeps everything organized.</p></article>
                    <article><span>03</span><h3>We confirm the job</h3><p>Respond quickly with a quote, availability, and next steps.</p></article>
                </div>
            </div>
        </section>

        <section id="reviews" class="section section-alt">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">Reviews</p>
                    <h2>A few short testimonials to make the page feel real.</h2>
                </div>
                <div class="testimonial-grid">
                    <blockquote>
                        <p>They were on time, polite, and left the property spotless. The process was simple.</p>
                        <footer>Sarah M. <span>House Cleaning</span></footer>
                    </blockquote>
                    <blockquote>
                        <p>We booked an office clean after hours and everything was handled smoothly.</p>
                        <footer>Daniel P. <span>Office Cleaning</span></footer>
                    </blockquote>
                    <blockquote>
                        <p>Fast reply, clear pricing, and a great result after our move-out clean.</p>
                        <footer>Priya K. <span>End of Lease</span></footer>
                    </blockquote>
                </div>
            </div>
        </section>

        <section id="quote" class="section quote-section">
            <div class="container quote-grid">
                <div>
                    <p class="eyebrow">Get a quote</p>
                    <h2>Capture leads with a simple PHP form.</h2>
                    <p>
                        Submitted enquiries are stored locally in JSON, so you already have a working backend
                        without adding a database on day one.
                    </p>
                    <div class="contact-box">
                        <div>
                            <strong>Phone</strong>
                            <a href="tel:+61455584786">+61 455 584 786</a>
                        </div>
                        <div>
                            <strong>Email</strong>
                            <a href="mailto:hello@greensparkcleaning.com">hello@greensparkcleaning.com</a>
                        </div>
                    </div>
                </div>
                <form class="quote-form" method="post" action="#quote" novalidate>
                    <?php if ($flash): ?>
                        <div class="flash success"><?= e((string)$flash) ?></div>
                    <?php endif; ?>
                    <?php if ($errors): ?>
                        <div class="flash error">Please fix the highlighted fields and try again.</div>
                    <?php endif; ?>

                    <label>
                        <span>Your name</span>
                        <input type="text" name="name" value="<?= e($form['name']) ?>" class="<?= isset($errors['name']) ? 'invalid' : '' ?>" placeholder="Full name">
                        <?php if (isset($errors['name'])): ?><small><?= e($errors['name']) ?></small><?php endif; ?>
                    </label>
                    <label>
                        <span>Phone number</span>
                        <input type="text" name="phone" value="<?= e($form['phone']) ?>" class="<?= isset($errors['phone']) ? 'invalid' : '' ?>" placeholder="+61...">
                        <?php if (isset($errors['phone'])): ?><small><?= e($errors['phone']) ?></small><?php endif; ?>
                    </label>
                    <label>
                        <span>Email address</span>
                        <input type="email" name="email" value="<?= e($form['email']) ?>" class="<?= isset($errors['email']) ? 'invalid' : '' ?>" placeholder="you@example.com">
                        <?php if (isset($errors['email'])): ?><small><?= e($errors['email']) ?></small><?php endif; ?>
                    </label>
                    <label>
                        <span>Service type</span>
                        <select name="service" class="<?= isset($errors['service']) ? 'invalid' : '' ?>">
                            <?php foreach ($services as $service): ?>
                                <option value="<?= e($service) ?>" <?= $form['service'] === $service ? 'selected' : '' ?>><?= e($service) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['service'])): ?><small><?= e($errors['service']) ?></small><?php endif; ?>
                    </label>
                    <label>
                        <span>Job details</span>
                        <textarea name="message" rows="4" class="<?= isset($errors['message']) ? 'invalid' : '' ?>" placeholder="Tell us about the property and what you need cleaned."><?= e($form['message']) ?></textarea>
                        <?php if (isset($errors['message'])): ?><small><?= e($errors['message']) ?></small><?php endif; ?>
                    </label>
                    <label>
                        <span>Address or suburb</span>
                        <input type="text" name="address" value="<?= e($form['address']) ?>" placeholder="Westmead, Parramatta, Sydney">
                    </label>
                    <button class="button button-primary button-full" type="submit">Save Request</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <strong>GreenSpark Cleaning</strong>
                <p>Simple one-page PHP site with a working enquiry backend.</p>
            </div>
            <div>
                <strong>Open hours</strong>
                <p>Mon - Sun: 8:00 AM - 5:00 PM</p>
            </div>
            <div>
                <strong>Location</strong>
                <p>Sydney, NSW, Australia</p>
            </div>
        </div>
    </footer>
</body>
</html>
