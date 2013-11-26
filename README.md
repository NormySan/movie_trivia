Movie Trivia
============

0.6 - Game is Playable!

För att kunna köra applikationen krävs en config fil som ska ligga i includes och heta config.php.

Här är koden som ska skrivas in i config filen, SITE_PATH ska vara adressen till där index.php ligger baserat utifrån webbrooten (htdocs).

```
define('SITE_TITLE', 'Movie Trivia');
define('SITE_PATH', '/movie_trivia');
define('DB_CONSTRING', 'mysql:host=127.0.0.1;dbname=movie_trivia'); // 127.0.0.1 is the same as localhost
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
```