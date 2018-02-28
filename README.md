<p align="center">
    <a href="http://sylius.org" target="_blank">
        <img src="http://demo.sylius.org/assets/shop/img/logo.png" />
    </a>
</p>
<h1 align="center">Plugin Skeleton</h1>
<p align="center">
    <a href="https://packagist.org/packages/sylius/plugin-skeleton" title="License">
        <img src="https://img.shields.io/packagist/l/sylius/plugin-skeleton.svg" />
    </a>
    <a href="https://packagist.org/packages/sylius/plugin-skeleton" title="Version">
        <img src="https://img.shields.io/packagist/v/sylius/plugin-skeleton.svg" />
    </a>
    <a href="http://travis-ci.org/Sylius/PluginSkeleton" title="Build status">
        <img src="https://img.shields.io/travis/Sylius/PluginSkeleton/master.svg" />
    </a>
    <a href="https://scrutinizer-ci.com/g/Sylius/PluginSkeleton/" title="Scrutinizer">
        <img src="https://img.shields.io/scrutinizer/g/Sylius/PluginSkeleton.svg" />
    </a>
</p>

## Installation

1. Run `composer require gravita/notify-when-available`.

2. Add the plugin to AppKernel.php:

    ```php
    public function registerBundles(): array
    {
        return array_merge(parent::registerBundles(), [
            
            // ...

            new \Gravita\SyliusNotifyWhenAvailablePlugin\GravitaSyliusNotifyWhenAvailablePlugin(),
        ]);
    }
    ```
    
3. Add the required resource files to your config.yml:

    ````yaml
    imports:
       # ...
       - { resource: "@GravitaSyliusNotifyWhenAvailablePlugin/Resources/config/config.yml" }
       - { resource: "@GravitaSyliusNotifyWhenAvailablePlugin/Resources/config/resources.yml" }
    ````
    
4. Add the bundle routing file to your routing.yml
    ````yaml
    gravita_notify_when_available_shop:
        resource: "@GravitaSyliusNotifyWhenAvailablePlugin/Resources/config/app/shop_routing.yml"
    ````
    
5. Update your database:
    ````bash
    php bin\console doctrine:schema:update --force
    ````

## Usage

### Running plugin tests

  Once installed, the plugin adds two fields to the product variant form "Details" tab:
  - Available from: this fields holds the message showed to the user if this product variant is
    not checked as "Available"
  - Available for purchase: if this fields is **not checked** the message that is set on "Available from"
    will bee shown to the user. With this message will be a form to register an email on the 
    notification list of the product variant.
