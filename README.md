# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 10

You can test your classes if they throw exception in certain conditions.

Just create a class `Registry` that sets a mixed value as a named item in an internal array. Use a method `set()` or the magic method `__set()` for this.

Another method `get` or `__get()` should check if an item with a given exists and return it on success. If there is no such item, throw an `\OutOfBoundsException`.

Check branch _step-10_ out if you have a hard time to write the code!