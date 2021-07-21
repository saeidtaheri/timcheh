<?php

namespace App\Driver;

use App\Contract\NotificationDriverInterface;

class LogDriver implements NotificationDriverInterface
{
    const TYPE = 'Log';

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
            return "Log user {$recipient} with Log driver";
        }

        return true;
    }

    public function isLoggable(string $type): bool
    {
        return self::TYPE == $type;
    }
}