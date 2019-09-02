# Unittests for WordPress plugins (without WP)

Repository for my workshop at [WordCamp Catania 2019](https://2019.catania.wordcamp.org/)

---

Your system or PHP version is not up to date? You could skip this step but let's try something [not so] new!

[Get docker](https://docs.docker.com/install/) first:

`sudo apt-get install docker-ce docker-ce-cli containerd.io`

Lets build our Docker image:

`docker-compose up`

Now we can run any command we'd like:

`docker-compose run plugin composer test`  