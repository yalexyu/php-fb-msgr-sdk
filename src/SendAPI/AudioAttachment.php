<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class AudioAttachment
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/audio-attachment
 * @package FBMSGR\SendAPI
 */
class AudioAttachment extends MultimediaAttachment
{

    /**
     * @see SendAttachment
     *
     * @return string
     */
    public function getType()
    {
        return SendAttachment::TYPE_AUDIO;
    }
}