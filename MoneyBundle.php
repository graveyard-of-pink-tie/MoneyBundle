<?php

namespace Money\MoneyBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Integration with Symfony 2.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Pink Tie (2012)
 */
class MoneyBundle extends Bundle
{
    /** 
     * Load the form type DIC configurations.
     *
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->load(__DIR__."/Resources/config/form_types.xml");
    }
}
