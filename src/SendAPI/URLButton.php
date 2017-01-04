<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class URLButton
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/url-button
 * @package FBMSGR\SendAPI
 */
class URLButton extends Button
{

    /**
     * Button title. 20 character limit.
     *
     * @var string
     */
    protected $title;

    /**
     * This URL is opened in a mobile browser when the button is tapped
     *
     * @var string
     */
    protected $url;

    /**
     * Height of the Webview. Valid values: compact, tall, full.
     *
     * @var string
     */
    protected $webviewHeightRatio;

    /**
     * Must be true if using Messenger Extensions.
     *
     * @var bool
     */
    protected $messengerExtensions = false;

    /**
     * URL to use on clients that don't support Messenger Extensions.
     * If this is not defined, the url will be used as the fallback.
     * It may only be specified if messenger_extensions is true.
     *
     * @var string
     */
    protected $fallbackUrl = null;

    /**
     * The button type. Must be TYPE_URL.
     *
     * @return string
     */
    public function getType()
    {
        return Button::TYPE_URL;
    }

    /**
     * @see SendBaseModel
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'type' => $this->getType(),
            'url' => $this->url,
            'title' => $this->title,
            'webview_height_ratio' => $this->webviewHeightRatio,
        ];

        if ($this->messengerExtensions && $this->fallbackUrl) {
            $data['messenger_extensions'] = $this->messengerExtensions;
            $data['fallback_url'] = $this->fallbackUrl;
        }

        return $data;
    }
}