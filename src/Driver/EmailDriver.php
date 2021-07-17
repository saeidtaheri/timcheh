<?php

namespace App\Driver;

use App\Contract\NotificationDriverInterface;
use Psr\Log\LoggerInterface;

class EmailDriver implements NotificationDriverInterface
{
    protected $username;
    protected $password;
    protected $logger;
    protected $domain;
    protected $recipients = [];

    public function __construct(string $username, string $password, string $domain, LoggerInterface $logger)
    {
        $this->username = $username;
        $this->password = $password;
        $this->domain = $domain;
        $this->logger = $logger;
    }

    public function recipients(array $recipients) : NotificationDriverInterface
    {
        $this->recipients = $recipients;

        return $this;
    }

    public function send(string $message): bool
    {
        foreach ($this->recipients as $recipient)
        {
            $this->logger->notice(
                sprintf("sending email '%s' to '%s' with '%s'", $message, $recipient, $this->domain)
            );

            // Real World Example Should be Something Like This
            // Event->dispatch(SendNotificationEmail($recipient, $message))
        }

        return true;
    }
}