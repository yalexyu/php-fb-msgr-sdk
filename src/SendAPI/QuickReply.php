<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class QuickReply
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/quick-replies#quick_reply
 * @package FBMSGR\SendAPI
 */
class QuickReply extends SendBaseModel
{

    /**
     * Required. 'text' or 'location'
     *
     * @var string
     */
    protected $contentType;

    /**
     * Required if text contentType. The object's caption.
     * 20 character limit w/truncation.
     *
     * @var string
     */
    protected $title;

    /**
     * Required if text contentType. Custom data that will be sent back to you via webhook
     * 1000 character limit.
     *
     * @var string
     */
    protected $payload;

    /**
     * Optional. URL of image for text quick replies
     * Image for image_url should be at least 24x24 and will be cropped and re-sized.
     *
     * @var string
     */
    protected $imageUrl;

    const CONTENT_TYPE_TEXT = 'text';
    const CONTENT_TYPE_LOCATION = 'location';

    /**
     * QuickReply constructor.
     * @param string $title
     * @param string $payload
     * @param string $contentType
     * @param string $imageUrl
     */
    public function __construct($title, $payload, $contentType = self::CONTENT_TYPE_TEXT, $imageUrl = null)
    {
        $this->title = $title;
        $this->payload = $payload;
        $this->contentType = $contentType;
        $this->imageUrl = $imageUrl;
    }

    public function asText()
    {
        $this->contentType = 'text';

        return $this;
    }

    public function asLocation()
    {
        $this->contentType = 'location';

        return $this;
    }

    public function withTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function withPayload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

    public function withImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @see SendBaseModel
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'content_type' => $this->contentType,
        ];

        if ($this->contentType == self::CONTENT_TYPE_TEXT) {
            $data['title'] = $this->title;
            $data['payload'] = $this->payload;

            if ($this->imageUrl) {
                $data['image_url'] = $this->imageUrl;
            }
        }

        return $data;
    }
}