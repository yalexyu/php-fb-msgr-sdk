<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class Button
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/buttons
 * @package FBMSGR\SendAPI
 */
abstract class Button extends SendBaseModel
{

    // Available button types
    const TYPE_POSTBACK = 'postback';
    const TYPE_SHARE = 'element_share';
    const TYPE_URL = 'web_url';

    /**
     * Get the button type.
     *
     * @return string
     */
    abstract public function getType();

}