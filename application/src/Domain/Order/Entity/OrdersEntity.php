<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 15:41
 */

namespace App\Domain\Order\Entity;

class OrdersEntity
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
     * @return OrdersEntity
     */
    public function setOrderId(string $orderId): OrdersEntity
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
     * @return OrdersEntity
     */
    public function setOrderStatus($orderStatus): OrdersEntity
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
     * @return OrdersEntity
     */
    public function setOrderMrid($orderMrid): OrdersEntity
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
     * @return OrdersEntity
     */
    public function setOrderRefid($orderRefid): OrdersEntity
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
     * @return OrdersEntity
     */
    public function setOrderPurchaseDate($orderPurchaseDate): OrdersEntity
    {
        $this->orderPurchaseDate = $orderPurchaseDate;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "order_id" => $this->orderId,
            "order_status" => $this->orderStatus,
            "order_mrid" => $this->orderMrid,
            "order_refid" => $this->orderRefid,
            "birth_date" => !empty($this->orderPurchaseDate) ? $this->orderPurchaseDate->format('Y-m-d H:i:s') : null,
        ];
    }
}
