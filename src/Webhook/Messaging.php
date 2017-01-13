<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

use FBMSGR\Exceptions\UnrecognizedMessagingType;

/**
 * Class Messaging
 *
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference#messaging
 * @package FBMSGR\SendAPI
 */
abstract class Messaging extends WebhookBaseModel
{

    /**
     * Messaging Types
     */
    const TYPE_RECEIVED = 'received';
    const TYPE_DELIVERED = 'delivered';
    const TYPE_POSTBACK = 'postback';

    /**
     * Get the sender id.
     *
     * @return string
     */
    public function getSenderId()
    {
        return $this->data['sender']['id'];
    }

    /**
     * Get the recipient id.
     *
     * @return string
     */
    public function getRecipientId()
    {
        return $this->data['recipient']['id'];
    }

    /**
     * Get the messaging type. Return null if we could not determine the type.
     *
     * @param array $data POST data
     *
     * @return string
     * @throws UnrecognizedMessagingType
     */
    public static function determineType(array $data)
    {
        // Check if TYPE_POSTBACK
        if (isset($data['postback'])) {
            return self::TYPE_POSTBACK;
        }

        // Check if TYPE_RECEIVED
        if (isset($data['message'])) {
            return self::TYPE_RECEIVED;
        }

        // Check if TYPE_DELIVERED
        if (isset($data['delivery'])) {
            return self::TYPE_DELIVERED;
        }

        // Unrecognized type
        throw new UnrecognizedMessagingType();
    }
}