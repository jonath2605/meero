<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:47
 */

namespace App\Domain\Order\Exception;

use RuntimeException;

class OrderNotFoundException extends RuntimeException
{
    public static function createFromId(int $id)
    {
        return new static(
            sprintf(
                ' Order not found, id : %d ',
                $id
            )
        );
    }
}