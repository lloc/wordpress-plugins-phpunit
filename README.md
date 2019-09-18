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
 
## Step 2

There are at least two valid frameworks that come handy when you plan to test WordPress extensions:

- [WP_Mock](https://github.com/10up/wp_mock)
- [Brain Monkey](https://brain-wp.github.io/BrainMonkey/)

Let's try **Brain Monkey**:

`composer require --dev brain/monkey:2.*`

This will automatically install also [Mockery](http://docs.mockery.io/en/latest/) and [Patchwork](http://patchwork2.org/). Just execute `composer install` and you are good to go.

## Step 3

Create a directory that will give a home to a small test-class named _WcctaTest.php_:

    mkdir -p tests/wccta

Excellent! Now let's create a *phpunit.xml* configuration file in the root directory.

> You could also decide to run your tests with the configuration parameters from the command-line. See the next part (hint: 'scripts')!  

Great! Add some sections to the *composer.json* file:

- **name**: that's the project's name for packagist.org
- **description**: that's the description for packagist.org
- **type**: defines the code as WordPress plugin 
- **autoload**: Let's use a PSR-4 autoloader!
- **scripts**: now you can just type `composer test`

## Step 4

Let's create a directory that will give a home to our source-code. This is the place where you'll put a first class that you'll test soon.

    mkdir -p src/wccta && touch src/wccta/Plugin.php
    rm -f tests/wccta/WcctaTest.php && touch tests/wccta/PluginTest.php
    touch wordpress-plugins-phpunit.php

We want to test some methods of the class `Plugin`. Imagine a method called `is_loaded` that returns `true` on success. When you are ready, execute:

    composer test

_Hint_: Your system or PHP version is not up to date? You could just skip this step but let's try something [not so] new!
        
    docker run -it --rm -v $PWD:/app -w /app php:7.3-alpine php ./vendor/bin/phpunit
 
You can probably imagine that some plugins will have lots of classes and that you can easily forget to test all the functionalities that need testing.

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
    
_Now you know Kung Fu!_ Please, open the file _./reports/php/coverage/index.html_ in your browser!

## Step 5

Let's wire our `Plugin`-class to the plugin. Before we really go into testing, I'll just show you how to declare parts of your codes as not to test.

    @codeCoverageIgnore

This is one of the important [annotations](https://phpunit.readthedocs.io/en/8.3/annotations.html) that are available. We'll get back to this later, but first:

_Run the unittests with the coverage-report again!_

You did maybe notice the column `CRAP` in the coverage report. _CRAP_ is an acronym for **change risk anti-patterns**. It indicates how risky a change of code in a class or method can be. You can lower the risk (and therefore the index) with less complex code **and** full coverage with tests.
    
## Step 6

Let's start to test something. But what? There is still no further functionality written that needs testing.
 
Here comes [TDD](https://it.wikipedia.org/wiki/Test_driven_development) (Test Driven Development) into the game.

Even if you decide _not_ to use this technique, you should at least know what we are talking about.

Let's first create a Test `CarTest` that should test if the method `getPrice` returns the string `'€ 14.500'`. Then create a Class `Car` and write the method `getPrice` that **satisfies** the test. Don't start with the implementation.

At this point let me introduce also the testing pattern **AAA** (Arrange Act Assert) which is widely accepted in **TDD**. It describes how to arrange a test and is very similar to **GWT** (Given When Then) from [BDD](https://en.wikipedia.org/wiki/Behavior-driven_development) (Behavior-driven Development).

## Step 7

Let's now implement the `getPrice`-method.

First of all assume that we can pass a JSON-object to our `Car`-class. This will give our class a bit more value.

Now write a constructor that handles the JSON input and stores the object in a member-var `data`. The `getPrice`-method should take the price from the `data` var and take care of the formatted output.

The variable `price` should be an integer. This is probably no problem right now because you can use the PHP-function `number_format()` to create the correct output. But in a _WordPress_ installation you'll expect to have the locale set, to `it_IT` (Italian) for example.

## Step 8

The correct way to format numbers in _WordPress_ is the use of the function `number_format_i18n()`.

So let's change that and see what happens:

`Error: Call to undefined function wccta\number_format_i18n()`

We will fix this in a second, but let's prepare this a bit first. **Brain Monkey** uses the `setUp()` and `tearDown()` provided by **PHPUnit**. You can [override those methods](https://brain-wp.github.io/BrainMonkey/docs/wordpress-setup.html). Let's create a custom `TestCase` - name it `WcctaCase` - that we can extend because we'll do this probably in every test-class.

Now let's include the namespace for tests in the section autoload-dev:

    "autoload-dev": {
        "psr-4": {
            "tests\\wccta\\": "tests/wccta"
        }
    },

Finally, let's change the parent of our test-classes.

    class CarTest extends WcctaTestCase { // ... }

We are ready to mock our first _WordPress_-function with

    Functions\expect( $name_of_function )->andReturn( $value );

## Step 9

Writing a test for just one expectation seems too much effort. What if you want to test against different values?

Dataprovider to the rescue. I already talked about annotations in step 5. This one is also very useful:

    @dataprovider method_that_returns_data
    
Have a look at my example. `getData` returns an array of arrays. Each of these arrays contains 3 values. Our `test_getPrice`-method can so not only accept the dataprovider with the annotation, but it can also define the input-vars as parameters.

## Step 10

You can test your classes if they throw exception in certain conditions.

Just create a class `Registry` that sets a mixed value as a named item in an internal array. Use a method `set()` or the magic method `__set()` for this.

Another method `get` or `__get()` should check if an item with a given exists and return it on success. If there is no such item, throw an `\OutOfBoundsException`.

Check branch _step-10_ out if you have a hard time to write the code!