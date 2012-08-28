<?php

namespace Money\MoneyBundle\Tests\Form\DataTransformer;

use PHPUnit_Framework_TestCase;
use Money\Currency;
use Money\MoneyBundle\Form\DataTransformer\CurrencyToStringTransformer;

/**
 * Test for the datatransformer that converts between Currency instances and
 * strings.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Mathias Verraes (2011)
 */
final class CurrencyToStringTransformerTest extends PHPUnit_Framework_TestCase
{
    private $transformer;
    
    public function setUp()
    {
        $this->transformer = new CurrencyToStringTransformer();
    }

    /**
     * @dataProvider provideValidCurrencySymbols
     */
    public function testReverseTransformValidCurrencyFromSymbolString($symbol)
    {
        $this->assertEquals(new Currency($symbol), $this->transformer->reverseTransform($symbol));
    }

    /**
     * @dataProvider provideInvalidCurrencySymbols
     * @expectedException Symfony\Component\Form\Exception\TransformationFailedException
     */
    public function testReverseTransformInvalidCurrencyFromSymbolString($symbol)
    {
        $this->transformer->reverseTransform($symbol);
    }

    /**
     * @dataProvider provideValidCurrencySymbols
     */
    public function testTransformValidCurrencyToSymbolString($symbol)
    {
        $this->assertEquals($symbol, $this->transformer->transform(new Currency($symbol)));
    }

    public function testTransformNullToNull()
    {
        $this->assertNull($this->transformer->transform(null));
    }
    
    /**
     * @expectedException Symfony\Component\Form\Exception\UnexpectedTypeException
     */
    public function testTransformThrowsUnexpectedTypeExceptionForUnexpectedValueType()
    {
        $this->transformer->transform($this);
    }
    
    public function testReverseTransformNullToNull()
    {
        $this->assertNull($this->transformer->reverseTransform(null));
    }
    
    /**
     * @expectedException Symfony\Component\Form\Exception\UnexpectedTypeException
     */
    public function testReverseTransformThrowsUnexpectedTypeExceptionForUnexpectedValueType()
    {
        $this->transformer->reverseTransform(array());
    }

    public function provideValidCurrencySymbols()
    {
        return array(
            array('EUR'),
            array('USD'),
            array('GBP'),
            array('JPY')
        );
    }
    
    /**
     * These currency symbols are considered invalid, because they are not
     * implemented by the library.
     */
    public function provideInvalidCurrencySymbols()
    {
        return array(
            array('AED'), 
            array('AFN'), 
            array('ALL'), 
            array('AMD'), 
            array('ANG'), 
            array('AOA'), 
            array('ARS'), 
            array('AUD'), 
            array('AWG'), 
            array('AZN'), 
            array('BAM'), 
            array('BBD'), 
            array('BDT'), 
            array('BGN'), 
            array('BHD'), 
            array('BIF'), 
            array('BMD'), 
            array('BND'), 
            array('BOB'), 
            array('BRL'), 
            array('BSD'), 
            array('BTN'), 
            array('BWP'), 
            array('BYR'), 
            array('BZD'), 
            array('CAD'), 
            array('CDF'), 
            array('CHF'), 
            array('CLP'), 
            array('CNY'), 
            array('COP'), 
            array('CRC'), 
            array('CUC'), 
            array('CUP'), 
            array('CVE'), 
            array('CZK'), 
            array('DJF'), 
            array('DKK'), 
            array('DOP'), 
            array('DZD'), 
            array('EGP'), 
            array('ERN'), 
            array('ETB'), 
            array('FJD'), 
            array('FKP'), 
            array('GEL'), 
            array('GGP'), 
            array('GHS'), 
            array('GIP'), 
            array('GMD'), 
            array('GNF'), 
            array('GTQ'), 
            array('GYD'), 
            array('HKD'), 
            array('HNL'), 
            array('HRK'), 
            array('HTG'), 
            array('HUF'), 
            array('IDR'), 
            array('ILS'), 
            array('IMP'), 
            array('INR'), 
            array('IQD'), 
            array('IRR'), 
            array('ISK'), 
            array('JEP'), 
            array('JMD'), 
            array('JOD'), 
            array('KES'), 
            array('KGS'), 
            array('KHR'), 
            array('KMF'), 
            array('KPW'), 
            array('KRW'), 
            array('KWD'), 
            array('KYD'), 
            array('KZT'), 
            array('LAK'), 
            array('LBP'), 
            array('LKR'), 
            array('LRD'), 
            array('LSL'), 
            array('LTL'), 
            array('LVL'), 
            array('LYD'), 
            array('MAD'), 
            array('MDL'), 
            array('MGA'), 
            array('MKD'), 
            array('MMK'), 
            array('MNT'), 
            array('MOP'), 
            array('MRO'), 
            array('MUR'), 
            array('MVR'), 
            array('MWK'), 
            array('MXN'), 
            array('MYR'), 
            array('MZN'), 
            array('NAD'), 
            array('NGN'), 
            array('NIO'), 
            array('NOK'), 
            array('NPR'), 
            array('NZD'), 
            array('OMR'), 
            array('PAB'), 
            array('PEN'), 
            array('PGK'), 
            array('PHP'), 
            array('PKR'), 
            array('PLN'), 
            array('PYG'), 
            array('QAR'), 
            array('RON'), 
            array('RSD'), 
            array('RUB'), 
            array('RWF'), 
            array('SAR'), 
            array('SBD'), 
            array('SCR'), 
            array('SDG'), 
            array('SEK'), 
            array('SGD'), 
            array('SHP'), 
            array('SLL'), 
            array('SOS'), 
            array('SPL'), 
            array('SRD'), 
            array('STD'), 
            array('SVC'), 
            array('SYP'), 
            array('SZL'), 
            array('THB'), 
            array('TJS'), 
            array('TMT'), 
            array('TND'), 
            array('TOP'), 
            array('TRY'), 
            array('TTD'), 
            array('TVD'), 
            array('TWD'), 
            array('TZS'), 
            array('UAH'), 
            array('UGX'), 
            array('UYU'), 
            array('UZS'), 
            array('VEF'), 
            array('VND'), 
            array('VUV'), 
            array('WST'), 
            array('XAF'), 
            array('XCD'), 
            array('XDR'), 
            array('XOF'), 
            array('XPF'), 
            array('YER'), 
            array('ZAR'), 
            array('ZMK'), 
            array('ZWD')
        );
    }
}
