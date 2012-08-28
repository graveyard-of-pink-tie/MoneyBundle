<?php

namespace Money\MoneyBundle\Tests\Form\Type;

use Money\Currency;
use Money\Money;
use Money\MoneyBundle\Form\Type\MoneyType;
use Symfony\Component\Form\Tests\FormIntegrationTestCase;

/**
 * Integration test for the MoneyType that integrates the Money object with the
 * Symfony form component.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Mathias Verraes (2011)
 */
final class MoneyTypeTest extends FormIntegrationTestCase
{
    public function setUp()
    {
        if (!function_exists('intl_get_error_code')) {
            $this->markTestSkipped("Missing the Intl extension.");
        }
        
        parent::setUp();
    }

    public function testBindValid()
    {
        $units = 10;
        $symbol = 'EUR';
        $form = $this->factory->create(new MoneyType(), null, array());

        $form->bind(array(
            'units' => (string) $units,
            'currency' => $symbol
        ));

        $this->assertEquals(new Money($units, new Currency($symbol)), $form->getData());
        $this->assertEquals(array('units' => (string) $units, 'currency' => $symbol), $form->getViewData());
    }
}
