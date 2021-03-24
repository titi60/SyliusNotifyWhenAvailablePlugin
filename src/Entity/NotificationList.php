<?php

namespace Titi60\SyliusNotifyWhenAvailablePlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * NotificationList
 */
class NotificationList implements ResourceInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $items;

    /**
     * @var ProductVariant
     */
    protected $productVariant;

    /**
     * NotificationList constructor.
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Add item.
     *
     * @param NotificationListItem $notificationListItem
     *
     * @return NotificationList
     */
    public function addItem(NotificationListItem $notificationListItem): NotificationList
    {
        $this->items->add($notificationListItem);
        $notificationListItem->setNotificationList($this);

        return $this;
    }

    /**
     * Remove item.
     *
     * @param NotificationListItem $notificationListItem
     *
     * @return NotificationList
     */
    public function removeItem(NotificationListItem $notificationListItem): NotificationList
    {
        $this->items->removeElement($notificationListItem);
        $notificationListItem->setNotificationList(null);

        return $this;
    }

    /**
     * Set items.
     *
     * @param ArrayCollection $items
     *
     * @return NotificationList
     */
    public function setItems(ArrayCollection $items): NotificationList
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get items.
     *
     * @return ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set productVariant.
     *
     * @param ProductVariant $productVariant
     *
     * @return NotificationList
     */
    public function setProductVariant(ProductVariant $productVariant): NotificationList
    {
        $this->productVariant = $productVariant;

        return $this;
    }

    /**
     * Get productVariant.
     *
     * @return ProductVariant
     */
    public function getProductVariant(): ProductVariant
    {
        return $this->productVariant;
    }
}
