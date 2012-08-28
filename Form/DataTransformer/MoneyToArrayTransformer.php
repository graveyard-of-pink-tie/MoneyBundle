<?php
/**
 * This file is part of the Money library
 *
 * Copyright (c) 2011 Mathias Verraes
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Money\MoneyBundle\Form\DataTransformer;

use Money\Money;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

/**
 * Transforms between a Money instance and an array.
 *
 * @author Marijn Huizendveld <marijn@pink-tie.com>
 * @copyright Mathias Verraes (2011)
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
