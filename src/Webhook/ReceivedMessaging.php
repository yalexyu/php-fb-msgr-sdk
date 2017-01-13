<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class ReceivedMessaging
 *
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference/message
 * @package FBMSGR\Webhook
 */
class ReceivedMessaging extends Messaging
{
    /**
     * The Message object that was received.
     *
     * @var WebhookMessage
     */
    protected $message;

    /**
     * The message timestamp. Epoch time in milliseconds.
     *
     * @var int
     */
    protected $timestamp;

    /**
     * ReceivedMessaging constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->timestamp = $this->data['timestamp'];
        $this->message = new WebhookMessage($this->data['message']);
    }

    /**
     * @return WebhookMessage
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}