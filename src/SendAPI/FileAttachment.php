<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class FileAttachment
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/file-attachment
 * @package FBMSGR\SendAPI
 */
class FileAttachment extends MultimediaAttachment
{

    /**
     * @see SendAttachment
     *
     * @return string
     */
    public function getType()
    {
        return SendAttachment::TYPE_FILE;
    }
}