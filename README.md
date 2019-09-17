# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

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
