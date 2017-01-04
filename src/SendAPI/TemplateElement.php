<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class TemplateElement
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/generic-template#element
 * @package FBMSGR\SendAPI
 */
class TemplateElement extends SendBaseModel
{

    /**
     * Required.
     * Bubble title. Max 80 characters.
     *
     * @var string
     */
    protected $title;

    /**
     * Optional.
     * Bubble subtitle. Max 80 characters.
     *
     * @var string
     */
    protected $subtitle;

    /**
     * Optional.
     * Bubble image.
     *
     * @var string
     */
    protected $imageUrl;

    /**
     * Optional.
     * Default action to be triggered when user taps on the element.
     *
     * Note: This is like the URL button, except 'title' is not required.
     *
     * @var URLButton
     */
    protected $defaultAction;

    /**
     * Optional.
     * Set of buttons that appear as call-to-actions. Max 3.
     *
     * @var array
     */
    protected $buttons;

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image_url' => $this->imageUrl,
            'default_action' => $this->defaultAction->toArray(),
        ];

        $buttonData = [];
        foreach ($this->buttons as $button) {
            $buttonData[] = $button->toArray();
        }
        $data['buttons'] = $buttonData;

        return $data;
    }
}