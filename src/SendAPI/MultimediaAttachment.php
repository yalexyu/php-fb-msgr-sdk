<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class MultimediaAttachment
 * @package FBMSGR\SendAPI
 */
abstract class MultimediaAttachment extends SendAttachment
{

    /**
     * Optional. Indicates that this attachment is reusable.
     *
     * @var bool
     */
    public $isReusable;

    /**
     * Required if not supplying payload url.
     *
     * A reusable attachment's id.
     *
     * @var string
     */
    public $attachmentId;

    /**
     * Direct url to the multimedia being attached. Acceptable URLs vary by type.
     * Reference FB documentation for more details.
     *
     * @var string
     */
    public $url;

    /**
     * @see SendBaseModel
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->getType(),
            'payload' => [
                'url' => $this->url
            ],
        ];
    }

}