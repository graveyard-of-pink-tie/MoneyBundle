<?php

namespace Money\MoneyBundle\Form\DataTransformer;

use Money\Money;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

/**
 * Transforms between a Money instance and an array.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Pink Tie (2012)
 */
class MoneyToArrayTransformer implements DataTransformerInterface
{
    /**
     * Transforms a Money instance into an array.
     *
     * @param  $value Money\Money value.
     *
     * @return array Array value.
     *
     * @throws UnexpectedTypeException if the given value is not a Boolean
     */
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Money) {
            throw new UnexpectedTypeException($value, 'Money');
        }

        return array(
            'units' => $value->getUnits(),
            'currency' => $value->getCurrency()
        );
    }

    /**
     * Transforms an array into a Money instance.
     *
     * @param array $value Array value.
     *
     * @return Money\Money Money value.
     *
     * @throws UnexpectedTypeException if the given value is not a string
     */
    public function reverseTransform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!is_array($value)) {
            throw new UnexpectedTypeException($value, 'array');
        }

        // TODO: Rename to amount
        return new Money($value['units'], $value['currency']);
    }

}
