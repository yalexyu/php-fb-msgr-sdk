<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Describes an event entry, which contains data pertaining to the FB msgr event.
 *
 * Class Entry
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference#entry
 * @package App\Models\Daisy
 */
class Entry extends WebhookBaseModel
{

    /**
     * The Page ID
     *
     * @var string
     */
    protected $pageId;

    /**
     * Time of update (Epoch time in milliseconds)
     *
     * @var int
     */
    protected $time;

    /**
     * An array of objects related to messaging
     *
     * @var array
     */
    protected $messaging;

    /**
     * Entry constructor. Create an event entry object from POST data.
     *
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->pageId = $this->data['id'];
        $this->time = $this->data['time'];

        // $data['messaging'] is an array
        $messaging = [];
        foreach ($data['messaging'] as $message) {
            // Assume messagingType is valid
            $messagingType = Messaging::determineType($message);
            if ($messagingType == Messaging::TYPE_RECEIVED) {
                $messaging[] = new ReceivedMessaging($message);
            } elseif ($messagingType == Messaging::TYPE_DELIVERED) {
                $messaging[] = new DeliveredMessaging($message);
            } elseif ($messagingType == Messaging::TYPE_POSTBACK) {
                $messaging[] = new PostbackMessaging($message);
            }
        }
        $this->messaging = $messaging;
    }

    /**
     * Get the messaging objects related to this entry.
     *
     * @return array
     */
    public function getMessaging()
    {
        return $this->messaging;
    }

}