<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class WebhookAttachment
 *
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference/message#attachment
 * @package FBMSGR\Webhook
 */
class WebhookAttachment extends WebhookBaseModel
{

    /**
     * image, audio, video, file or location
     *
     * @var string
     */
    protected $type;

    /**
     * multimedia or location payload
     *
     * @var string
     */
    protected $payload;

    /**
     * Supported attachment types
     */
    const TYPE_IMAGE = 'image';
    const TYPE_AUDIO = 'audio';
    const TYPE_VIDEO = 'video';
    const TYPE_FILE = 'file';
    const TYPE_LOCATION = 'location';

    /**
     * Attachment constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->type = $data['type'];
        $this->payload = $data['payload'];
    }

    /**
     * URL of the file.
     *
     * Available for image, audio, video, file types
     *
     * @return string|null      Returns null if url is not supported for the attachment type.
     */
    public function getUrl()
    {
        if ($this->type == self::TYPE_IMAGE ||
            $this->type == self::TYPE_AUDIO ||
            $this->type == self::TYPE_VIDEO ||
            $this->type == self::TYPE_FILE
        ) {
            return $this->data['payload']['url'];
        }

        return null;
    }

    /**
     * Coordinate's latitude.
     *
     * Available for location type.
     *
     * @return number|null      Returns null if latitude is not supported for the attachment type.
     */
    public function getLatitude()
    {
        if ($this->type == self::TYPE_LOCATION) {
            return $this->data['payload']['coordinate']['lat'];
        }

        return null;
    }

    /**
     * Coordinate's longitude.
     *
     * Available for location type.
     *
     * @return number|null      Returns null if latitude is not supported for the attachment type.
     */
    public function getLongitude()
    {
        if ($this->type == self::TYPE_LOCATION) {
            return $this->data['payload']['coordinate']['long'];
        }

        return null;
    }
}