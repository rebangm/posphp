Point of sale
========================

1) Installation
----------------------------------

### Use Composer (*recommended*)

    curl -s http://getcomposer.org/installer | php

    php composer.phar install

2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

The script returns a status code of `0` if all mandatory requirements are met,
`1` otherwise.

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.


3) Configure Apache 
--------------------------------

Add this rewrite rule to your host configuration

        rewriteEngine On
        # skip "real" requests
        RewriteCond %{REQUEST_FILENAME} -f
        RewriteRule .* - [QSA,L]
        RewriteRule ^(.*)$ /app_dev.php [QSA,L]


3) Browsing the Demo Application
--------------------------------

Congratulations! You're now ready to use point of sale.


