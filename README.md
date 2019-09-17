# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

_Optional, but you might need to [get docker](https://docs.docker.com/install/) installed:_
                       
    sudo apt-get install docker-ce docker-ce-cli containerd.io

---

## Step 9

Writing a test for just one expectation seems too much effort. What if you want to test against different values?

Dataprovider to the rescue. I already talked about annotations in step 5. This one is also very useful:

    @dataprovider method_that_returns_data
    
Have a look at my example. `getData` returns an array of arrays. Each of these arrays contains 3 values. Our `test_getPrice`-method can so not only accept the dataprovider with the annotation, but it can also define the input-vars as parameters.
