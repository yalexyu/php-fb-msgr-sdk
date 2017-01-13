<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class VideoAttachment
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/video-attachment
 * @package FBMSGR\SendAPI
 */
class VideoAttachment extends MultimediaAttachment
{

    /**
     * @see SendAttachment
     *
     * @return string
     */
    public function getType()
    {
        return SendAttachment::TYPE_VIDEO;
    }
}