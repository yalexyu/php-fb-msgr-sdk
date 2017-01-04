<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class PostbackButton
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/postback-button
 * @package FBMSGR\SendAPI
 */
class PostbackButton extends Button
{
    /**
     * Button title. 20 character limit.
     *
     * @var string
     */
    protected $title;

    /**
     * This data will be sent back to your webhook. 1000 character limit.
     *
     * @var string
     */
    protected $payload;

    /**
     * PostbackButton constructor.
     * @param $title
     * @param $payload
     */
    public function __construct($title, $payload)
    {
        $this->title = $title;
        $this->payload = $payload;
    }

    /**
     * @see Button
     *
     * @return string
     */
    public function getType()
    {
        return Button::TYPE_POSTBACK;
    }

    /**
     * @see SendBaseModel
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->getType(),
            'title' => $this->title,
            'payload' => $this->payload,
        ];
    }
}