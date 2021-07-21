<?php

namespace App\Driver;

use App\Contract\NotificationDriverInterface;

class SmsDriver implements NotificationDriverInterface
{
    const TYPE = 'Sms';

    protected $recipients = [];

    public function recipients(array $recipients) : NotificationDriverInterface
    {
        $this->recipients = $recipients;

        return $this;
    }

    public function send(string $message): bool
    {
        foreach ($this->recipients as $recipient)
        {
            return "send message to {$recipient} with sms driver";
        }

        // send sms in queue in real world

        return true;
    }

    public function isLoggable(string $type): bool
    {
        return self::TYPE == $type;
    }
}