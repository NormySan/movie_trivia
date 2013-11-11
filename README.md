movie_trivia
============

För att kunna köra applikationen krävs en config fil som ska ligga i includes och det ska heta config.php

<code>
define('SITE_TITLE', 'Movie Trivia');

// Path to the location of index.php
define('SITE_PATH', '/movie_trivia');

// MySQL configuration
define('DB_CONSTRING', 'mysql:host=127.0.0.1;dbname=movie_trivia'); // 127.0.0.1 is the same as localhost
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
</code>
