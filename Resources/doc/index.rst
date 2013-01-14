BadgeBundle
===========

This bundle provides a management of badges for user, support for Symfony2.


## Installation

Installation is a quick 3 step process:

1. Download BadgeBundle using composer
2. Enable the Bundle
3. Configure your application's config.yml

### Step 1: Download BadgeBundle using composer

Add BadgeBundle in your composer.json:

```js
{
    "require": {
        "antwebes/badge-bundle" : "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update antwebes/badge-bundle
```

Composer will install the bundle to your project's `vendor/antwebes/badge-bundle` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new ant\BadgeBundle\AntBadgeBundle()
    );
}
```
### Step3: Configuration 

Register the bundle's routes

Finally, add the following to your routing file:

``` yaml
ant_badge:
    db_driver: orm
    badge_class: Yourproject\YourBundle\Entity\Badge
``` 

``` yaml

# app/config/routing.yml
badge_bundle:
    resource: "@AntBadgeBundle/Resources/config/routing.yml"
    prefix:   /badge
```


Creating concrete model classes
-------------------------------

- For MongoDB_
- For Doctrine_ORM_

.. _Doctrine_ORM: concrete_orm.rst


Congratulations! You're ready to use badges in your site!