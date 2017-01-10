<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Interface HasSendAPIURL
 *
 * As of Jan 10, 2017, this url should be https://graph.facebook.com/v2.6/me/messages
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference#request
 *
 * @package FBMSGR\SendAPI
 */
interface HasSendAPIURL {

    public function getSendAPIURL();
}