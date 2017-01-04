<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Webhook;

/**
 * Class WebhookBaseModel
 * @package FBMSGR\Webhook
 */
abstract class WebhookBaseModel
{

    /**
     * Underlying raw data.
     *
     * @var array
     */
    protected $data;

    /**
     * BaseModel constructor. Always call this __construct before child code.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Access the underlying raw data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}