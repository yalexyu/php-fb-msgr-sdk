<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Interface HasPageAccessToken
 *
 * This can be found in your FB developer account. Make sure the token is generated for the
 * correct/corresponding page that the chat bot is managing.
 *
 * Currently no support for managing multiple pages' access tokens.
 *
 * @package FBMSGR\SendAPI
 */
interface HasPageAccessToken {

    public function getPageAccessToken();
}