# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 5

Let's wire our Plugin class to the plugin. Before we really go into testing, I just show you how to declare parts of your codes as _not to test_.

    @codeCoverageIgnore
    
This is one of the important [annotations](https://phpunit.readthedocs.io/en/8.3/annotations.html) that are available. We will come to this later, but first:

_Run the unittests with the coverage-report again!_

You did maybe notice the column `CRAP` in the coverage report. CRAP is an acronym for **change risk anti-patterns**. It indicates how risky a change of code in a class or method can be. You can lower the risk (and therefore the index) with less complex code **and** full coverage with tests.
