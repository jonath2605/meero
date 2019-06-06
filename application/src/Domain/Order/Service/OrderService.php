<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:55
 */

namespace App\Domain\Order\Service;

use App\Domain\Order\Entity\OrderCollection;
use App\Domain\Order\Entity\OrderEntity;
use App\Domain\Order\Exception\InvalidParameterException;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use Valitron\Validator;

class OrderService
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * UserService constructor.
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return OrderCollection
     */
    public function all(int $offset = 0, int $limit = 5): OrderCollection
    {
        return $this->orderRepository->all($offset, $limit);
    }

    /**
     * @param int $id
     * @return OrderEntity
     */
    public function get(int $id): OrderEntity
    {
        return $this->orderRepository->get($id);
    }

    /**
     * @param array $params
     * @return OrderEntity
     */
    public function post(array $params): OrderEntity
    {
        $validator = new Validator($params);
        $validator->rules(
            [
                "required" => ['order_id', 'order_status'],
                "alpha" => ['order_id', 'order_status', 'order_mrid', 'order_refid'],
                "date" => ['order_purchase_date'],
            ]
        );

        if(!$validator->validate()) {
            throw InvalidParameterException::createFromErrors($validator->errors());
        }

        $orderEntity = new OrderEntity();
        $orderEntity->setOrderId($params['order_id']);
        $orderEntity->setOrderStatus($params['order_status']);

        if(isset($params['order_mrid'])) {
            $orderEntity->setOrderMrid($params['order_mrid']);
        }

        if(isset($params['order_refid'])) {
            $orderEntity->setOrderRefid($params['order_refid']);
        }

        if(isset($params['order_purchase_date'])) {
            $date = new \DateTime($params['order_purchase_date']);
            $orderEntity->setOrderPurchaseDate($date);
        }
        return $this->orderRepository->post($orderEntity);
    }

    /**
     * @param array $params
     * @return OrderEntity
     */
    public function put(array $params): OrderEntity
    {
        $validator = new Validator($params);
        $validator->rules(
            [
                "required" => ['id'],
                "integer" => ['id'],
                "alpha" => ['order_id', 'order_status', 'order_mrid', 'order_refid'],
                "date" => ['order_purchase_date'],
            ]
        );

        if(!$validator->validate()) {
            throw InvalidParameterException::createFromErrors($validator->errors());
        }

        $orderEntity = $this->orderRepository->get($params['id']);

        if(isset($params['order_id'])) {
            $orderEntity->setOrderId($params['order_id']);
        }

        if(isset($params['order_status'])) {
            $orderEntity->setOrderStatus($params['order_status']);
        }

        if(isset($params['order_mrid'])) {
            $orderEntity->setOrderMrid($params['order_mrid']);
        }

        if(isset($params['order_refid'])) {
            $orderEntity->setOrderRefid($params['order_refid']);
        }

        if(isset($params['order_purchase_date'])) {
            $date = new \DateTime($params['order_purchase_date']);
            $orderEntity->setOrderPurchaseDate($date);
        }

        return $this->orderRepository->put($orderEntity);
    }
}
