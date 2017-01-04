<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class BaseModel
 * @package AlexYu\SendAPI
 */
abstract class SendBaseModel
{

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    abstract public function toArray();

}