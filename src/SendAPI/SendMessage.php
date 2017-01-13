<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class SendMessage
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference#message
 * @package FBMSGR\SendAPI
 */
class SendMessage extends SendBaseModel
{

    /**
     * Text or attachment must be set. They are mutually exclusive.
     *
     * Text must be UTF-8 and has a 640 character limit.
     *
     * @var string
     */
    protected $text;

    /**
     * Text or attachment must be set. They are mutually exclusive.
     *
     * @var SendAttachment
     */
    protected $attachment;

    /**
     * Optional.
     *
     * Array of quick_reply to be sent with messages
     *
     * @var array
     */
    protected $quickReplies;

    /**
     * Optional.
     *
     * Custom string that will be re-delivered to webhook listeners. 1000 char limit.
     *
     * @var string
     */
    protected $metadata;

    /**
     * @see SendBaseModel
     * @return array
     */
    public function toArray()
    {
        $data = [];
        // Check text
        if ($this->text) {
            $data['text'] = $this->text;
        } else {
            $data['attachment'] = $this->attachment->toArray();
        }

        if ($this->metadata) {
            $data['metadata'] = $this->metadata;
        }

        if (count($this->quickReplies) > 0) {
            $quickReplies = [];
            foreach ($this->quickReplies as $quickReply) {
                $quickReplies[] = $quickReply->toArray();
            }
            $data['quick_replies'] = $quickReplies;
        }

        return $data;
    }

    /*
     |-------------------
     | Build the message
     |-------------------
     */

    /**
     * Set a text value to $this Message. Remove any existing attachment, if applicable.
     * Return $this for method chaining.
     *
     * @param $text
     * @return $this
     */
    public function withText($text)
    {
        $this->text = $text;
        $this->attachment = null;

        return $this;
    }

    /**
     * Set an Attachment to $this Message. Remove any existing text, if applicable.
     * Returns $this for method chaining.
     *
     * @param SendAttachment $attachment
     * @return $this
     */
    public function withAttachment(SendAttachment $attachment)
    {
        $this->attachment = $attachment;
        $this->text = null;

        return $this;
    }

    /**
     * Set the quick replies to be shown with $this Message.
     * Returns $this for method chaining.
     *
     * @param array $quickReplies
     * @return $this
     */
    public function withQuickReplies(array $quickReplies)
    {
        $this->quickReplies = $quickReplies;

        return $this;
    }

    /**
     * Add a QuickReply object to the array of quick replies to be sent with $this Message.
     *
     * @param QuickReply $quickReply
     * @return $this
     */
    public function addQuickReply(QuickReply $quickReply)
    {
        $this->quickReplies[] = $quickReply;

        return $this;
    }

    /**
     * Set the meta data to be sent with $this Message.
     *
     * @param string $metadata
     * @return $this
     */
    public function withMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /*
     |----------------------------
     | Retrieve data from message
     |----------------------------
     */

    /**
     * Get the text for this message.
     *
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get the attachment for this message.
     *
     * @return SendAttachment|null
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Get the metadata corresponding to this message.
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

}