<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class GenericTemplateElement
 *
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference/generic-template#element
 * @package FBMSGR\SendAPI
 */
class GenericTemplateElement extends SendBaseModel
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
        ];

        if ($this->subtitle) {
            $data['subtitle'] = $this->subtitle;
        }

        if ($this->imageUrl) {
            $data['image_url'] = $this->imageUrl;
        }

        if ($this->defaultAction) {
           $data['default_action'] = $this->defaultAction->toArray();
        }

        $buttonData = [];
        foreach ($this->buttons as $button) {
            $buttonData[] = $button->toArray();
        }
        $data['buttons'] = $buttonData;

        return $data;
    }

    public function withTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function withSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function withImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function withDefaultAction(URLButton $button)
    {
        $this->defaultAction = $button;

        return $this;
    }

    public function withButtons(array $buttons)
    {
        // TODO: Validate buttons
        $this->buttons = $buttons; // Assuming types are buttons

        return $this;
    }

    public function addButton(Button $button)
    {
        $this->buttons[] = $button;

        return $this;
    }
}