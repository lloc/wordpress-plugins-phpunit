# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 1

I assume you have [Composer](https://getcomposer.org/) installed. Let's install [PHPUnit](https://phpunit.de/) first:

    composer require --dev phpunit/phpunit ^8.3

Please, check also the [requirements](https://phpunit.readthedocs.io/en/8.3/installation.html#requirements)!

> PHPUnit 8.3 requires at least PHP 7.2! By the way - security support for PHP 7.1 ends on 1st of December 2019.

_Hint_: You don't have **Composer** installed? Try this!

    docker run --rm -it -v $PWD:/app -u $(id -u):$(id -g) composer install
