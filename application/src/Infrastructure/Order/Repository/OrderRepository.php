<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:52
 */

namespace App\Infrastructure\Order\Repository;

use App\Domain\Order\Entity\OrderCollection;
use App\Domain\Order\Entity\OrdersEntity;
use App\Domain\Order\Exception\OrderNotFoundException;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManger;

    /**
     * UserRepository constructor.
     * @param EntityManagerInterface $entityManger
     */
    public function __construct(EntityManagerInterface $entityManger)
    {
        $this->entityManger = $entityManger;
    }

    /**
     * @inheritdoc
     */
    public function all(int $offset = 0, int $limit = 5): OrderCollection
    {
        $orders = $this
            ->entityManger
            ->getRepository(OrdersEntity::class)
            ->findBy([], null, $limit, $offset);

        $ordersCollection = new OrderCollection();
        foreach ($orders as $order)
        {
            $ordersCollection->add($order);
        }
        return $ordersCollection;
    }

    /**
     * @inheritdoc
     */
    public function get(int $id): OrdersEntity
    {
        $orderEntity = $this
            ->entityManger
            ->getRepository(OrdersEntity::class)
            ->find($id);

        if(!($orderEntity instanceof OrdersEntity)) {
            throw OrderNotFoundException::createFromId($id);
        }

        return $orderEntity;
    }

    /**
     * @inheritdoc
     */
    public function post(OrdersEntity $orderEntity): OrdersEntity
    {
        $this->entityManger->persist($orderEntity);
        $this->entityManger->flush();
        return $orderEntity;
    }

    /**
     * @inheritdoc
     */
    public function put(OrdersEntity $orderEntity): OrdersEntity
    {
        $this->entityManger->flush();
        return $orderEntity;
    }
}
