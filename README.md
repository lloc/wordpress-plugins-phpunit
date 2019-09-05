# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 2

There are at least two valid frameworks that come handy when you plan to test WordPress extensions:

- [WP_Mock](https://github.com/10up/wp_mock)
- [Brain Monkey](https://brain-wp.github.io/BrainMonkey/)

Let's try *Brain Monkey*:

`composer require --dev brain/monkey:2.*`

This will automatically install also [Mockery](http://docs.mockery.io/en/latest/) and [Patchwork](http://patchwork2.org/). Just execute `composer install` and you are good to go.
