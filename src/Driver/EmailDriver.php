<?php

namespace App\Driver;

use App\Contract\NotificationDriverInterface;

class EmailDriver implements NotificationDriverInterface
{
    const TYPE = 'Email';

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
            return "send Email to {$recipient} with email driver";

            // Real World Example Should be Something Like This
            // Event->dispatch(SendNotificationEmail($recipient, $message))
        }

        return true;
    }

    public function isLoggable(string $type): bool
    {
        return self::TYPE == $type;
    }
}