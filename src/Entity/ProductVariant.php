<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 19/2/18
 * Time: 9:51
 */

namespace Gravita\SyliusNotifyWhenAvailablePlugin\Entity;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;

class ProductVariant extends BaseProductVariant
{
    /**
     * @var bool
     */
    protected $isAvailable = true;

    /**
     * @var string
     */
    protected $availableFrom;

    /**
     * @var NotificationList
     */
    protected $notificationList;

    /**
     * ProductVariant constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getAvailableFrom(): string
    {
        return $this->getTranslation()->getAvailableFrom() ?? '';
    }

    /**
     * @param string $availableFrom
     *
     * @return ProductVariant
     */
    public function setAvailableFrom(?string $availableFrom): ProductVariant
    {
        $this->getTranslation()->setAvailableFrom($availableFrom);

        return $this;
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    /**
     * @param bool $isAvailable
     *
     * @return ProductVariant
     */
    public function setIsAvailable(bool $isAvailable): ProductVariant
    {
        $this->isAvailable = $isAvailable;

        return $this;
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
     * @return ProductVariant
     */
    public function setNotificationList(NotificationList $notificationList): ProductVariant
    {
        $this->notificationList = $notificationList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): ProductVariantTranslationInterface
    {
        return new ProductVariantTranslation();
    }
}