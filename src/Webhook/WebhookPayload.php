<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class WebhookPayload
 *
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference#payload
 * @package FBMSGR\SendAPI
 */
class WebhookPayload extends WebhookBaseModel
{

    /*
     |----------------
     | API properties
     |----------------
     */

    /**
     * The type of object that this payload corresponds to. Must be 'page'
     *
     * @var string
     */
    protected $object;

    /**
     * An array of event Entry objects, which each contain data describing the event that occurred.
     *
     * @var array
     */
    protected $entries;


    /**
     * Payload constructor. Create a Payload object from the POST data.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->object = $this->data['object'];

        $entries = [];
        $entryData = isset($this->data['entry']) ? $this->data['entry'] : [];
        foreach ($entryData as $entry) {
            $entries[] = new Entry($entry);
        }
        $this->entries = $entries;
    }

    /**
     * Get the payload's entries.
     *
     * @return array
     */
    public function getEntries()
    {
        return $this->entries;
    }

}