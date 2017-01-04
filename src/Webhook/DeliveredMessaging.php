<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class DeliveredMessaging
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-delivered
 * @package FBMSGR\Webhook
 */
class DeliveredMessaging extends Messaging
{

    /**
     * Contains data pertaining to message/messages that were delivered.
     *
     * @var Delivery
     */
    protected $delivery;

    /**
     * DeliveredMessaging constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $deliveryData = isset($this->data['delivery']) ? $this->data['delivery'] : [];
        $this->delivery = new Delivery($deliveryData);
    }

    /**
     * @return Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

}