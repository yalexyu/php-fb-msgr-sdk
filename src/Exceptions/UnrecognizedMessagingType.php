<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\Exceptions;


use Exception;

class UnrecognizedMessagingType extends \Exception
{

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct('Unrecognized messaging type received.', $code, $previous);
    }
}