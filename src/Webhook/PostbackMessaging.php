<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class PostbackMessaging
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference/postback
 * @package FBMSGR\Webhook
 */
class PostbackMessaging extends Messaging
{

    /**
     * Epoch time, milliseconds
     *
     * @var int
     */
    protected $timestamp;

    /**
     * payload parameter that was defined with the button
     *
     * @var string
     */
    protected $postbackPayload;

    /**
     * PostbackMessaging constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->timestamp = $this->data['timestamp'];
        $this->postbackPayload = $this->data['postback']['payload'];
    }

    /**
     * @return string
     */
    public function getPostbackPayload()
    {
        return $this->postbackPayload;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}