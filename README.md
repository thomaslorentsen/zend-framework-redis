# Redis Support for Zend Framework 1
Demos Zend Framework using Redis Sentinel as a Session manager
# Perquisites
Set up the redis sentinel test environment from [github.com/thomaslorentsen/redis-sentinel](https://github.com/thomaslorentsen/redis-sentinel)

Install package dependencies with composer
```
composer install
```
# Building
The build the docker image
```bash
docker build -t php-redis .
```
# Usage
Start the docker images
```bash
docker run -p 8080:80 -d --name php-redis php-redis
```
You can then view the website at [localhost:8080](http://localhost:8080/)
# How it works
First you need the [Predis library](https://github.com/nrk/predis).
This is installed with composer by running ```composer require phpredis/phpredis```

You also need the [Redis Save Handler](application/library/Custom/Session/SaveHandler/Redis.php) provided and add it to your application.

In your boostrap you need the ```_initSession``` function to set the save handler.
```php
<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initSession()
    {
        if ( ! isset($this->_options['resources']['session']['savehandler']['class'])) {
            return;
        }

        $saveHandlerOptions = $this->_options['resources']['session']['savehandler'];
        $class = $saveHandlerOptions['class'];
        $options = $saveHandlerOptions['options'];

        $saveHandler = new $class($options);
        Zend_Session::setSaveHandler($saveHandler);
    }
}
?>
```
Then set the configuration in ```application.ini``` with:
```ini
resources.session.savehandler.class = Custom_Session_SaveHandler_Redis
resources.session.savehandler.options.sentinels[] = "tcp://192.168.33.10:26379"
resources.session.savehandler.options.client.replication = "sentinel"
resources.session.savehandler.options.client.service = "redismaster"
resources.session.savehandler.options.client.parameters.password = "foobared"
```

## References
[Zend Application Cheat Sheet](https://github.com/feibeck/application.ini/blob/master/application.ini)
