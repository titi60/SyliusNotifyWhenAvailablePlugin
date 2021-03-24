<?php

namespace Titi60\SyliusNotifyWhenAvailablePlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * NotificationListItem
 */
class NotificationListItem implements ResourceInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var bool
     */
    protected $notified = false;

    /**
     * @var NotificationList
     */
    protected $notificationList;

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
     * Set email.
     *
     * @param string $email
     *
     * @return NotificationListItem
     */
    public function setEmail(?string $email): NotificationListItem
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set notified.
     *
     * @param bool $notified
     *
     * @return NotificationListItem
     */
    public function setNotified(bool $notified): NotificationListItem
    {
        $this->notified = $notified;

        return $this;
    }

    /**
     * Get notified.
     *
     * @return bool
     */
    public function getNotified(): bool
    {
        return $this->notified;
    }

    /**
     * @return NotificationList
     */
    public function getNotificationList(): NotificationList
    {
        return $this->notificationList;
    }

    /**
     * @param NotificationList $notificationList
     *
     * @return NotificationListItem
     */
    public function setNotificationList(NotificationList $notificationList): NotificationListItem
    {
        $this->notificationList = $notificationList;

        return $this;
    }

    public function __toString()
    {
        return $this->notificationList->getProductVariant()->getCode() . '-' . $this->email;
    }
}
