<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class SentMessageResponse
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference#response
 * @package FBMSGR\Webhook
 */
class SentMessageResponse extends WebhookBaseModel
{

    /**
     * The recipient id
     *
     * @var string
     */
    protected $recipientId;

    /**
     * The message id
     *
     * @var string
     */
    protected $mid;

    /**
     * The error payload
     *
     * @var array
     */
    protected $error;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->recipientId = $data['recipient_id'];
        $this->mid = $data['message_id'];
        $this->error = $data['error'];
    }

    public function hasError()
    {
        return !is_null($this->error);
    }

    public function getError()
    {
        return $this->error;
    }

    public function getRecipientId()
    {
        return $this->recipientId;
    }

    public function getMessageId()
    {
        return $this->mid;
    }
}