<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class Message
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference/message
 * @package FBMSGR\Webhook
 */
class Message extends WebhookBaseModel
{

    /**
     * Message id.
     *
     * @var string
     */
    protected $mid;

    /**
     * Message sequence number.
     *
     * @var int
     */
    protected $seq;

    /**
     * Text of message. Nullable.
     *
     * @var string
     */
    protected $text;

    /**
     * An array of attachments. Can be empty.
     *
     * @var array
     */
    protected $attachments;

    /**
     * Optional custom data provided by the sending app.
     *
     * @var string
     */
    protected $quickReplyPayload;

    /**
     * Message constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->mid = $data['mid'];
        $this->seq = $data['seq'];
        $this->text = $data['text'];

        // This is only set if a quick_reply payload exists
        $this->quickReplyPayload = (isset($data['quick_reply']) && isset($data['quick_reply']['payload']))
            ? $data['quick_reply']['payload'] : null;

        $attachmentsData = isset($data['attachments']) ? $data['attachments'] : [];
        $this->attachments = [];
        foreach ($attachmentsData as $attachmentData) {
            $this->attachments[] = new WebhookAttachment($attachmentData);
        }
    }

    public function getMid()
    {
        return $this->mid;
    }

    public function getSequence()
    {
        return $this->seq;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getQuickReplyPayload()
    {
        return $this->quickReplyPayload;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }
}