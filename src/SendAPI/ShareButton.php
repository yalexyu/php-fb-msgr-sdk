<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class ShareButton
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/share-button
 * @package FBMSGR\SendAPI
 */
class ShareButton extends Button
{

    /**
     * @see Button
     *
     * @return string
     */
    public function getType()
    {
        return Button::TYPE_SHARE;
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
        ];
    }
}