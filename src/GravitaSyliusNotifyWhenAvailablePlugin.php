<?php

declare(strict_types=1);

namespace Gravita\SyliusNotifyWhenAvailablePlugin;

use Gravita\SyliusNotifyWhenAvailablePlugin\DependencyInjection\GravitaSyliusNotifyWhenAvailableExtension;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class GravitaSyliusNotifyWhenAvailablePlugin extends Bundle
{
    use SyliusPluginTrait;

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new GravitaSyliusNotifyWhenAvailableExtension();
    }
}
