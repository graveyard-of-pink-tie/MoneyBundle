<?php

namespace Money\MoneyBundle\Form\Type;

use Money\MoneyBundle\Form\DataTransformer\CurrencyToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Custom form type for the Currency object.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Pink Tie (2012)
 */
final class CurrencyType extends AbstractType
{
    /**
     * @param Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new CurrencyToStringTransformer());
    }

    /**
     * @param Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array('currency', 'choices'));
        $resolver->setDefaults(array(
            'currency' => 'EUR',
            'choices' => array('EUR', 'USD', 'GBP', 'JPY')
        ));
        $resolver->setAllowedTypes(array(
            'currency' => array('string'),
            'choices' => array('array')
        ));
        $resolver->setAllowedValues(array(
            'currency' => array('EUR', 'USD', 'GBP', 'JPY')
        ));
    }

    /** 
     * @return string
     */
    public function getName()
    {
        return 'currency';
    }
}
