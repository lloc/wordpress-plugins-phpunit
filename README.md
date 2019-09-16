# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

# Step 6

Let's start to test something. But what? There is still no further functionality written that needs testing.
 
Here comes [TDD](https://it.wikipedia.org/wiki/Test_driven_development) (Test Driven Development) into the game.

Even if you decide to *not* to use this technique, you should at least know what we are talking about.

Let's first create a Test `CarTest` that shall test if the method `getPrice` returns the string `'€ 14.500'`. Then create a Class `Car` and write the method `getPrice` that **satisfies** the test. Don't start with the implementation.

At this point let me introduce also the testing pattern AAA (Arrange Act Assert) which is widely accepted in TDD. It describes how to arrange a test and is very similar to GWT (Given When Then) from [BDD](https://en.wikipedia.org/wiki/Behavior-driven_development) (Behavior-driven Development).