# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 7

Let's now implement the getPrice-method.

First of all let's assume that we can pass a JSON-object to our car class. This will give our class a bit more value.

Now write an constructor that handles the JSON input and stores the object in a member-var `data`. The `getPrice`-method should take the price from the `data` var and take care of the formatted output.

The member-variable `price` should be an integer. This is probably right now no problem because you can use the PHP-function `number_format` to create the correct output. But in a WordPress installation you'll expect very likely to have the locale set, to *Italian (it_IT)* for example.
