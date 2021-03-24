<?php

namespace Titi60\SyliusNotifyWhenAvailablePlugin\Entity;

use Sylius\Component\Product\Model\ProductVariantTranslation as BaseProductVariantTranslation;
use Titi60\SyliusNotifyWhenAvailablePlugin\Model\ProductVariantTranslationInterface;

/**
 * ProductVariantTranslation
 */
class ProductVariantTranslation extends BaseProductVariantTranslation implements ProductVariantTranslationInterface
{
    /**
     * @var string|null
     */
    protected $availableFrom;

    /**
     * Set availableFrom.
     *
     * @param string|null $availableFrom
     *
     */
    public function setAvailableFrom(?string $availableFrom = null): void
    {
        $this->availableFrom = $availableFrom;
    }

    /**
     * Get availableFrom.
     *
     * @return string|null
     */
    public function getAvailableFrom(): ?string
    {
        return $this->availableFrom;
    }
}
