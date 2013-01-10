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
        new ant\BadgeBundle\BadgeBundle(),
    );
}
```
### Step3: Register the bundle's routes

Finally, add the following to your routing file:

``` yaml
# app/config/routing.yml

_imagine:
    resource: ruta
```

Congratulations! You're ready to use badges in your site!