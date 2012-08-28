<?php

namespace Money\MoneyBundle\Form\DataTransformer;

use Money\Currency;
use Money\UnknownCurrencyException;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Transforms between a Currency and a string.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Pink Tie (2012)
 */
class CurrencyToStringTransformer implements DataTransformerInterface
{
    /**
     * Transforms a Currency into a string.
     *
     * @param  $value Money\Currency value.
     *
     * @return string String value.
     *
     * @throws UnexpectedTypeException if the given value is not a Boolean
     */
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Currency) {
            throw new UnexpectedTypeException($value, 'Currency');
        }

        return (string) $value;
    }

    /**
     * Transforms a string into a Currency.
     *
     * @param string $value String value.
     *
     * @return Money\Currency Currency value.
     *
     * @throws UnexpectedTypeException if the given value is not a string
     * @throws TransformationFailedException When the currency is unknown
     */
    public function reverseTransform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        try {
            return new Currency($value);
        } catch (UnknownCurrencyException $e) {
            throw new TransformationFailedException($e->getMessage());
        }
    }

}
