<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:49
 */

namespace App\Domain\Order\Repository;

use App\Domain\Order\Entity\OrderCollection;
use App\Domain\Order\Entity\OrderEntity;

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
     * @return OrderEntity
     */
    public function get(int $id): OrderEntity;

    /**
     * @param OrderEntity $orderEntity
     * @return OrderEntity
     */
    public function post(OrderEntity $orderEntity): OrderEntity;

    /**
     * @param OrderEntity $orderEntity
     * @return OrderEntity
     */
    public function put(OrderEntity $orderEntity): OrderEntity;
}
