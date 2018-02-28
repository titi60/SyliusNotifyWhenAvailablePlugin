<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 22/2/18
 * Time: 11:20
 */

namespace Gravita\SyliusNotifyWhenAvailablePlugin\Menu;


use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addMenuItems(MenuBuilderEvent $event): void
    {
        /** @var ItemInterface $menu */
        $menu = $event->getMenu();

        $gravitaMenu = $menu
            ->addChild('gravita')
            ->setLabel('Gravita');
        $gravitaMenu
            ->addChild('gravita-notification-list', [
                'route' => 'gravita_admin_notification_list_item_index'
            ])
            ->setLabel('Notification List');
    }
}