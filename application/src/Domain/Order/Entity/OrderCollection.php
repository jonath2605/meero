<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:45
 */

namespace App\Domain\Order\Entity;

class OrderCollection extends \SplObjectStorage
{
    /**
     * @param OrdersEntity $object
     * @param null $data
     */
    public function add(OrdersEntity $object, $data = null)
    {
        parent::attach($object, $data);
    }

    /**
     * @param OrdersEntity $object
     */
    public function remove(OrdersEntity $object)
    {
        parent::detach($object);
    }
}
