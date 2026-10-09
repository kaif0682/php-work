# GreenSpark Cleaning Website

A PHP-based cleaning services website that presents cleaning services and allows visitors to submit quote requests. The repository includes a main landing page, individual service pages, shared includes, styling, and local JSON lead storage.

**Repository:** https://github.com/kaif0682/php-work

## Features

- Cleaning service landing page
- Service listing page
- Individual pages for cleaning services
- Reusable service-page template
- Quote request form with server-side PHP validation
- Lead requests saved locally to `data/leads.json`
- Shared components organized in an `includes/` directory
- Custom CSS styling

## Technologies

- **PHP** — Page rendering and form processing
- **HTML** — Website structure
- **CSS** — Website styling
- **JSON** — Local storage for submitted quote requests
- **XAMPP / Apache** — Suggested local development environment

## Project Structure

This tree is based on the top-level files and folders visible in the GitHub repository. The exact contents of `data/` and `includes/` should be confirmed by inspecting those directories.

```text
php-work/
├── data/                           # Local data storage
├── includes/                       # Shared PHP/HTML components
├── index.php                        # Main landing page and quote request handling
├── services.php                     # Cleaning services listing
├── service-page.php                 # Reusable service page template
├── styles.css                       # Main stylesheet
├── BBQ-cleaning-service.php
├── Carpet-cleaning-service.php
├── Endoflease-cleaning-service.php
├── Gallary.php                      # Filename spelling as in repository
├── Gutter-cleaning-service.php
├── High-pressure-cleaning-service.php
├── House-cleaning-service.php
├── Lawn-moving-service.php
├── Mattress-cleaning-service.php
├── Mould-cleaning-service.php
├── Office-cleaning-service.php
├── Oven-cleaning-service.php
├── Rug-cleaning-service.php
├── Tile-grout-cleaning-service.php
├── Upholstery-cleaning-service.php
└── Window-cleaning-service.php
```

## Requirements

- PHP installed locally
- Apache or another PHP-capable web server
- A modern web browser
- XAMPP is a convenient option for Windows

No Composer or Node.js setup is indicated by the visible top-level repository files.

## Run Locally with XAMPP

1. Install and open XAMPP.
2. Start **Apache** in the XAMPP Control Panel.
3. Clone or download this repository.
4. Place the project folder inside XAMPP's `htdocs` directory, for example:

   ```text
   C:\xampp\htdocs\php-work\
   ```
5. Open this URL in your browser:

   ```text
   http://localhost/php-work/
   ```
6. Test the home page, service pages, and quote request form.

If you use a different folder name or Apache port, update the URL accordingly.

## How Quote Requests Work

The `index.php` file processes POST submissions, validates fields such as name and phone, checks the email format when supplied, validates the selected service, and saves valid entries to a JSON file under `data/`.

The form data may include:

- Name
- Phone
- Email
- Selected service
- Address
- Message

The application can create `data/leads.json` when a valid request is submitted. Ensure PHP has permission to write to the `data/` directory.

**Privacy and deployment note:** JSON-file storage is suitable for simple demonstrations, not necessarily for production customer data. Before using this site with real customers, protect stored lead data from public access, add spam protection, validate data server-side, and configure secure backups and access controls. Never commit real customer information to GitHub.

## Customization

- **Website content:** Update the relevant `.php` page.
- **Styles:** Edit `styles.css`.
- **Shared components:** Review the files inside `includes/`.
- **Service pages:** Update the corresponding service PHP file or `service-page.php`, depending on how the page is implemented.
- **Lead storage:** Review the form-processing logic in `index.php` and the `data/` directory.

Keep filenames and links consistent when renaming pages. The repository currently contains `Gallary.php`; changing its spelling requires updating links that point to it.

## Troubleshooting

| Problem                               | What to check                                                                         |
| ------------------------------------- | ------------------------------------------------------------------------------------- |
| PHP code appears as text or downloads | Open the site through Apache, not by double-clicking the PHP file.                    |
| `localhost` cannot connect          | Make sure Apache is running and check for port conflicts.                             |
| A service page returns 404            | Confirm the exact filename and letter casing in the URL.                              |
| Quote requests are not saved          | Check PHP errors and write permissions for`data/`.                                  |
| CSS does not load                     | Confirm`styles.css` is in the expected location and the stylesheet path is correct. |
| Changes are not visible               | Refresh the browser and check whether cached CSS is being used.                       |

## Deployment

This is a PHP website, so it must be hosted on a server that supports PHP. Static-only hosting such as GitHub Pages cannot execute PHP form handling.

Before deploying:

1. Choose a PHP-compatible hosting provider.
2. Configure the document root and PHP version.
3. Ensure the lead-storage directory is writable by PHP but not publicly readable.
4. Test every service page and the quote form.
5. Configure HTTPS and appropriate privacy and security protections.
6. Remove test submissions and never deploy real lead data from `data/leads.json`.

## License

No license information was confirmed from the repository overview. Add a `LICENSE` file if you want to specify how others may use, modify, or distribute this project.

---

Built with PHP, HTML, and CSS.
