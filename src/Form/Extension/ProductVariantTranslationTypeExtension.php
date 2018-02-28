<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 23/2/18
 * Time: 10:38
 */

namespace Gravita\SyliusNotifyWhenAvailablePlugin\Form\Extension;


use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantTranslationType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductVariantTranslationTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('availableFrom', TextType::class);
    }


    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return ProductVariantTranslationType::class;
    }

}