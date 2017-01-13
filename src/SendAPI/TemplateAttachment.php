<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class TemplateAttachment
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/templates
 * @package FBMSGR\SendAPI
 */
abstract class TemplateAttachment extends SendAttachment
{

    // Available template attachment types
    const TEMPLATE_TYPE_BUTTON = 'button';
    const TEMPLATE_TYPE_GENERIC = 'generic'; // AKA horizontal carousel
    const TEMPLATE_TYPE_LIST = 'list';

    /**
     * @see SendAttachment
     *
     * @return string
     */
    public function getType()
    {
        return SendAttachment::TYPE_TEMPLATE;
    }

    /**
     * Get the template type.
     *
     * @return string
     */
    abstract public function getTemplateType();

}