<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class ButtonTemplateAttachment
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/button-template
 * @package FBMSGR\SendAPI
 */
class ButtonTemplateAttachment extends TemplateAttachment
{

    /**
     * Text that appears in main body.
     * Must be UTF-8 and has a 640 character limit
     *
     * @var string
     */
    protected $text;

    /**
     * Set of buttons that appear as call-to-actions
     *
     * Count limited to three (3).
     *
     * @var array
     */
    protected $buttons;

    /**
     * @see TemplateAttachment
     *
     * @return string
     */
    public function getTemplateType()
    {
        return TemplateAttachment::TEMPLATE_TYPE_BUTTON;
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
                'text' => $this->text,
            ]
        ];

        $buttonData = [];
        foreach ($this->buttons as $button) {
            $buttonData[] = $button->toArray();
        }

        if (! empty($buttonData)) {
            $data['payload']['buttons'] = $buttonData;
        }

        return $data;
    }

    /**
     * Set buttons for the template.
     * Allows method chaining.
     *
     * @param array $buttons
     * @return $this
     */
    public function withButtons(array $buttons)
    {
        $this->buttons = $buttons;

        return $this;
    }

    /**
     * Add a button to the template.
     * Allows method chaining.
     *
     * @param Button $button
     * @return $this
     */
    public function addButton(Button $button)
    {
        $this->buttons[] = $button;

        return $this;
    }

    /**
     * Set main body text for the template.
     * Allows method chaining.
     *
     * @param $text
     * @return $this
     */
    public function withText($text)
    {
        $this->text = $text;

        return $this;
    }
}