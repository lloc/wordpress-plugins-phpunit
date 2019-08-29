# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

---
## Step 1

Let's install *PHPUnit*:

 `composer require --dev phpunit/phpunit ^8.3`

Please, check also the [requirements](https://phpunit.readthedocs.io/en/8.3/installation.html#requirements)!  

## Step 2

There are at least two valid frameworks that are handy when you plan to test WordPress extensions:

- [WP_Mock](https://github.com/10up/wp_mock)
- [Brain Monkey](https://brain-wp.github.io/BrainMonkey/)

Let's try *brain Monkey*:

`composer require --dev brain/monkey:2.*`

This will install also [Mockery](http://docs.mockery.io/en/latest/) and [Patchwork](http://patchwork2.org/).

## Step 3

Let's create a directory that will be the home for our test:

`mkdir -p tests/wccta`

Excellent! Now let's create a *phpunit.xml* configuration file in the root directory.

> You could also decide to run your tests with the configuration parameters from the command-line. See the next part (hint: 'scripts'!  

Great! Now let's add some sections to *composer.json* file:

- **name**: that's the project's name for packagist.org
- **description**: that's the description for packagist.org
- **type**: defines the code as WordPress plugin 
- **autoload**: Let's use a PSR-4 autoloader!
- **scripts**: now you can just type `composer test`
