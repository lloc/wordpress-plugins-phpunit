# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

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
