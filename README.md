# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 1

I assume you have composer installed. Let's install *PHPUnit* first:

    composer require --dev phpunit/phpunit ^8.3

Please, check also the [requirements](https://phpunit.readthedocs.io/en/8.3/installation.html#requirements)!

> PHPUnit 8.3 requires at least PHP 7.2! By the way - security support for PHP 7.1 ends on 1st of December 2019.

_Hint_: You don't have composer installed? Try this!

    docker run --rm -it -v $PWD:/app -u $(id -u):$(id -g) composer install
 
## Step 2

There are at least two valid frameworks that come handy when you plan to test WordPress extensions:

- [WP_Mock](https://github.com/10up/wp_mock)
- [Brain Monkey](https://brain-wp.github.io/BrainMonkey/)

Let's try *Brain Monkey*:

`composer require --dev brain/monkey:2.*`

This will automatically install also [Mockery](http://docs.mockery.io/en/latest/) and [Patchwork](http://patchwork2.org/). Just execute `composer install` and you are good to go.

## Step 3

Let's create a directory that will be the home for a small test-class named *WcctaTest.php*:

    mkdir -p tests/wccta

Excellent! Now let's create a *phpunit.xml* configuration file in the root directory.

> You could also decide to run your tests with the configuration parameters from the command-line. See the next part (hint: 'scripts')!  

Great! Now let's add some sections to *composer.json* file:

- **name**: that's the project's name for packagist.org
- **description**: that's the description for packagist.org
- **type**: defines the code as WordPress plugin 
- **autoload**: Let's use a PSR-4 autoloader!
- **scripts**: now you can just type `composer test`

## Step 4

Lets create a directory that will give a home to our source-code. This is the place where you'll put a first class that you'll test soon.

    mkdir -p src/wccta && touch src/wccta/Plugin.php
    rm -f tests/wccta/WcctaTest.php && touch tests/wccta/PluginTest.php
    touch wordpress-plugins-phpunit.php

We want to test some method of the class plugin. Imagine a method called `is_loaded` that returns `true` on success. When you are ready, execute:

    composer test

_Hint_: Your system or PHP version is not up to date? You could just skip this step but let's try something [not so] new!
        
    docker run -it --rm -v $PWD:/app -w /app php:7.3-alpine php ./vendor/bin/phpunit
 
You can probably imagine that some plugins will have lots of classes and that you can easily forget to test all the functionality that need tests.

So, let's talk about __Coverage__!

Just add a custom command to the scripts-section in your *composer.json*:

    "coverage": "./vendor/bin/phpunit --coverage-html ./reports/php/coverage"

and a filter to your *phpunit.xml*:

    <filter>
        <whitelist processUncoveredFilesFromWhitelist="true">
            <directory>./src</directory>
        </whitelist>
    </filter>

Now just execute `composer coverage`! This will create a directory `./reports/php/coverage` together with some html-files. Well, not on all computers. Some will still get error-messages like:

    Error:         No code coverage driver is available

Let's fix that in our docker-image. I prepared a _Dockerfile_ so that you can just execute:
                                    
    docker build -t coverage .

And after the build process has been finished:

    docker run -it --rm -v $PWD:/app -w /app coverage:latest php ./vendor/bin/phpunit --coverage-html ./reports/php/coverage
    
_Now you know Kung Fu!_ Please, open the `./reports/php/coverage/index.html` in your browser!

## Step 5

Let's wire our Plugin class to the plugin. Before we really go into testing, I just show you how to declare parts of your codes as _not to test_.

    @codeCoverageIgnore
    
This is one of the important [annotations](https://phpunit.readthedocs.io/en/8.3/annotations.html) that are available. We will come to this later, but first:

_Run the unittests with the coverage-report again!_

You did maybe notice the column `CRAP` in the coverage report. CRAP is an acronym for **change risk anti-patterns**. It indicates how risky a change of code in a class or method can be. You can lower the risk (and therefore the index) with less complex code **and** full coverage with tests.
    
# Step 6

Let's start to test something. But what? There is still no further functionality written that needs testing.
 
Here comes [TDD](https://it.wikipedia.org/wiki/Test_driven_development) (Test Driven Development) into the game.

Even if you decide to *not* to use this technique, you should at least know what we are talking about.

Let's first create a Test `CarTest` that shall test if the method `getPrice` returns the string `'€ 14.500'`. Then create a Class `Car` and write the method `getPrice` that **satisfies** the test. Don't start with the implementation.

At this point let me introduce also the testing pattern AAA (Arrange Act Assert) which is widely accepted in TDD. It describes how to arrange a test and is very similar to GWT (Given When Then) from [BDD](https://en.wikipedia.org/wiki/Behavior-driven_development) (Behavior-driven Development).

