<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class Delivery
 *
 * @see https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-delivered#delivery
 * @package FBMSGR\SendAPI
 */
class Delivery extends WebhookBaseModel
{
    /**
     * Array containing message IDs of messages that were delivered. Field may not be present.
     *
     * @var array
     */
    protected $mids;

    /**
     * All messages that were sent before this timestamp were delivered.
     *
     * @var int
     */
    protected $watermark;

    /**
     * Sequence number.
     *
     * @var int
     */
    protected $seq;

    /**
     * Delivery constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->mids = isset($this->data['mids']) ? $this->data['mids'] : [];
        $this->watermark = $this->data['watermark'];
        $this->seq = $this->data['seq'];
    }

    /**
     * @return array
     */
    public function getMessageIds()
    {
        return $this->mids;
    }

    /**
     * @return int
     */
    public function getWatermark()
    {
        return $this->watermark;
    }

    /**
     * @return int
     */
    public function getSequence()
    {
        return $this->seq;
    }
}