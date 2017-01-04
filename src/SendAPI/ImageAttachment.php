<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class ImageAttachment
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/image-attachment
 * @package FBMSGR\SendAPI
 */
class ImageAttachment extends MultimediaAttachment
{

    /**
     * @see SendAttachment
     *
     * @return string
     */
    public function getType()
    {
        return SendAttachment::TYPE_IMAGE;
    }
}