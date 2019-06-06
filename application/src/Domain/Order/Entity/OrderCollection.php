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
     * @param OrderEntity $object
     * @param null $data
     */
    public function add(OrderEntity $object, $data = null)
    {
        parent::attach($object, $data);
    }

    /**
     * @param OrderEntity $object
     */
    public function remove(OrderEntity $object)
    {
        parent::detach($object);
    }
}
