<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class GenericTemplateAttachment
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/generic-template
 * @package FBMSGR\SendAPI
 */
class GenericTemplateAttachment extends TemplateAttachment
{

    /**
     * A list of TemplateElements
     *
     * @var array
     */
    protected $elements;

    /**
     * @see TemplateAttachment
     *
     * @return string
     */
    public function getTemplateType()
    {
        return TemplateAttachment::TEMPLATE_TYPE_GENERIC;
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
            'payload' => [
                'template_type' => $this->getTemplateType(),
            ]
        ];

        $elementData = [];
        foreach ($this->elements as $element) {
            $elementData[] = $element->toArray();
        }

        if (! empty($elementData)) {
            $data['payload']['elements'] = $elementData;
        }

        return $data;
    }

    public function withElements(array $elements)
    {
        $this->elements = $elements;

        return $this;
    }

    public function addElement(GenericTemplateElement $element)
    {
        $this->elements[] = $element;

        return $this;
    }
}