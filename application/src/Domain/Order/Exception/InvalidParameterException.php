<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:47
 */

namespace App\Domain\Order\Exception;

use RuntimeException;

class InvalidParameterException extends RuntimeException
{
    public static function createFromErrors(array $errors)
    {
        $messages = "";
        foreach ($errors as $error) {
            foreach ($error as $msg) {
                $messages .= $msg."\r\n";
            }
        }
        return new static($messages);
    }
}
