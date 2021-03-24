<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 19/2/18
 * Time: 11:57
 */

namespace Titi60\SyliusNotifyWhenAvailablePlugin\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductVariantTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('isAvailable', CheckboxType::class);
    }

    /**
     * {@inheritdoc}
     */
    public static function getExtendedTypes() : iterable
    {
        return [ProductVariantType::class];
    }

}