<?php

namespace Money\MoneyBundle\Form\Type;

use Money\MoneyBundle\Form\DataTransformer\MoneyToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\MoneyType as BaseMoneyType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Custom form type for the Money object.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Mathias Verraes (2011)
 */
final class MoneyType extends AbstractType
{
    /**
     * @param Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // TODO: Rename units to amount
            ->add('units', new BaseMoneyType(), array(
                'precision' => $options['precision'],
                'divisor' => $options['divisor'],
                'currency' => false
            ))
            ->add('currency', new CurrencyType(), array(
                'currency' => $options['currency'],
                'choices' => $options['currency_choices']
            ))
            ->addModelTransformer(
                new MoneyToArrayTransformer()
            );
    }

    /**
     * @param Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array('currency', 'currency_choices'));
        $resolver->setDefaults(array(
            'precision' => 2,
            'divisor' => 1,
            'currency' => 'EUR',
            'currency_choices' => array('EUR', 'USD', 'GBP', 'JPY')
        ));
    }

    /** 
     * @return string
     */
    public function getParent()
    {
        return 'field';
    }

    /** 
     * @return string
     */
    public function getName()
    {
        return 'money';
    }
}
