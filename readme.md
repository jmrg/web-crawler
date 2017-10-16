# Setting up the project
1. Download this repo
    - git clone https://github.com/jmrg/web-crawler.git
    - cd web-crawler
   
2. Install [PHP 5.6](http://php.net/downloads.php]), and verify your version with
    - php -V
   
3. Install [composer](https://getcomposer.org/download/), once installed run this commad to dowload all dependencies for the project
    - composer install
   
4. To serve your project locally:
    - php -S localhost:8000 -t public/index.php
      
# How to test
Simply run:
./vendor/bin/phpunit .
