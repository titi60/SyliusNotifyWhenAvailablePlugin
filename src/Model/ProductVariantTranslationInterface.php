<?php


namespace Titi60\SyliusNotifyWhenAvailablePlugin\Model;


interface ProductVariantTranslationInterface
{
    /**
     * @return string|null
     */
    public function getAvailableFrom(): ?string;

    /**
     * @param string|null $availableFrom
     */
    public function setAvailableFrom(?string $availableFrom): void;
}