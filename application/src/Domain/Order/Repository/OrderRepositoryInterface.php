<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:49
 */

namespace App\Domain\Order\Repository;

use App\Domain\Order\Entity\OrderCollection;
use App\Domain\Order\Entity\OrdersEntity;

interface OrderRepositoryInterface
{
    /**
     * @param int $offset
     * @param int $limit
     * @return OrderCollection
     */
    public function all(int $offset = 0, int $limit = 5): OrderCollection;

    /**
     * @param int $id
     * @return OrdersEntity
     */
    public function get(int $id): OrdersEntity;

    /**
     * @param OrdersEntity $orderEntity
     * @return OrdersEntity
     */
    public function post(OrdersEntity $orderEntity): OrdersEntity;

    /**
     * @param OrdersEntity $orderEntity
     * @return OrdersEntity
     */
    public function put(OrdersEntity $orderEntity): OrdersEntity;
}
