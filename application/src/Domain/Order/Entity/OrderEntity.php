<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:41
 */

namespace App\Domain\Order\Entity;

class OrderEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $orderStatus;

    /**
     * @var ?string
     */
    private $orderMrid;

    /**
     * @var ?string
     */
    private $orderRefid;

    /**
     * @var ?DateTime
     */
    private $orderPurchaseDate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return OrderEntity
     */
    public function setOrderId(string $orderId): OrderEntity
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param $orderStatus
     * @return OrderEntity
     */
    public function setOrderStatus($orderStatus): OrderEntity
    {
        $this->orderStatus = $orderStatus;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderMrid()
    {
        return $this->orderMrid;
    }

    /**
     * @param $orderMrid
     * @return OrderEntity
     */
    public function setOrderMrid($orderMrid): OrderEntity
    {
        $this->orderMrid = $orderMrid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderRefid()
    {
        return $this->orderRefid;
    }

    /**
     * @param $orderRefid
     * @return OrderEntity
     */
    public function setOrderRefid($orderRefid): OrderEntity
    {
        $this->orderRefid = $orderRefid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderPurchaseDate()
    {
        return $this->orderPurchaseDate;
    }

    /**
     * @param $orderPurchaseDate
     * @return OrderEntity
     */
    public function setOrderPurchaseDate($orderPurchaseDate): OrderEntity
    {
        $this->orderPurchaseDate = $orderPurchaseDate;
        return $this;
    }
}
