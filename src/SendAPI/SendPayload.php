<?php
/**
 *
 * @author Alex Yu <alex@young-yu.com>
 *
 */

namespace FBMSGR\SendAPI;

/**
 * Class Payload. Wraps messages and other payloads being sent.
 * @see https://developers.facebook.com/docs/messenger-platform/send-api-reference#payload
 * @package App\Models\Daisy
 */
abstract class SendPayload extends SendBaseModel implements HasPageAccessToken, HasSendAPIURL
{

    /**
     * Required.
     * The recipient id.
     *
     * @var string
     */
    protected $recipientId;

    /**
     * The message object.
     * Message or senderAction must be set.
     *
     * @var SendMessage
     */
    protected $message;

    /**
     * Message state: typing_on, typing_off, mark_seen.
     * Message or senderAction must be set.
     *
     * @var string
     */
    protected $senderAction;

    /**
     * Optional.
     * Push notification type: REGULAR, SILENT_PUSH, or NO_PUSH.
     *
     * Defaults to REGULAR.
     *
     * @var string
     */
    protected $notificationType;

    // Available sender action
    const MARK_SEEN = 'mark_seen';
    const TYPING_ON = 'typing_on';
    const TYPING_OFF = 'typing_off';

    // Available notification types
    const NOTIFICATION_TYPE_REGULAR = 'REGULAR';
    const NOTIFICATION_TYPE_SILENT_PUSH = 'SILENT_PUSH';
    const NOTIFICATION_TYPE_NO_PUSH = 'NO_PUSH';

    /**
     * @see SendBaseModel
     * @return array
     */
    public function toArray()
    {
        $data = [
            'recipient' => [
                'id' => $this->recipientId,
            ]
        ];

        // Assumes either $this->message or $this->senderAction must be non-null.
        if (! is_null($this->message) && $this->message instanceof SendMessage) {
            $data['message'] = $this->message->toArray();
        } else {
            $data['sender_action'] = $this->senderAction;
        }

        if ($this->notificationType) {
            $data['notification_type'] = $this->notificationType;
        }

        return $data;
    }

    /*
     |-------------------
     | Build the payload
     |-------------------
     */

    /**
     * Set the recipient id. Allows method chaining.
     *
     * @param string $recipientId
     * @return $this
     */
    public function withRecipientId($recipientId)
    {
        $this->recipientId = $recipientId;

        return $this;
    }

    /**
     * Set the message. Allows method chaining.
     *
     * @param SendMessage $message
     * @return $this
     */
    public function withMessage(SendMessage $message)
    {
        $this->message = $message;

        // Null senderAction to avoid conflicts.
        $this->senderAction = null;

        return $this;
    }

    /**
     * Set the sender action as mark seen. Allows method chaining.
     *
     * @return $this
     */
    public function withSenderActionMarkSeen()
    {
        $this->senderAction = self::MARK_SEEN;

        // Null message to avoid conflicts.
        $this->message = null;

        return $this;
    }

    /**
     * Set the sender action as typing on. Allows method chaining.
     *
     * @return $this
     */
    public function withSenderActionTypingOn()
    {
        $this->senderAction = self::TYPING_ON;

        // Null message to avoid conflicts.
        $this->message = null;

        return $this;
    }

    /**
     * Set the sender action as typing off. Allows method chaining.
     *
     * @return $this
     */
    public function withSenderActionTypingOff()
    {
        $this->senderAction = self::TYPING_OFF;

        // Null message to avoid conflicts.
        $this->message = null;

        return $this;
    }

    /*
     |----------------------------
     | Retrieve data from payload
     |----------------------------
     */

    public function getMessage()
    {
        return $this->message;
    }

    /*
     |---------
     | Sending
     |---------
     */

    /**
     * Send the payload using curl.
     *
     * @return mixed|bool   Returns false if execution failed.
     */
    public function send()
    {
        // Init curl handle with corresponding FB url & a valid access token.
        $ch = curl_init($this->getSendAPIURL() . '?access_token=' . $this->getPageAccessToken());

        // Set POST fields, including access_token
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->toArray()));

        // Make sure we get the full result back as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}