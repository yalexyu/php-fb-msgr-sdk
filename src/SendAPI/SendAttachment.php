<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class SendAttachment
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference#attachment
 * @package FBMSGR\SendAPI
 */
abstract class SendAttachment extends SendBaseModel
{

    // Available attachment types
    const TYPE_IMAGE = 'image';
    const TYPE_AUDIO = 'audio';
    const TYPE_VIDEO = 'video';
    const TYPE_FILE = 'file';
    const TYPE_TEMPLATE = 'template';

    /**
     * Get the attachment type.
     *
     * @var string
     */
    abstract public function getType();

}