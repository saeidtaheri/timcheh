<?php

namespace App\Driver;

use App\Contract\NotificationDriverInterface;
use Psr\Log\LoggerInterface;

class LogDriver implements NotificationDriverInterface
{
    protected $logger;
    protected $storage;
    protected $recipients = [];

    public function __construct(string $storage, LoggerInterface $logger)
    {
        $this->logger= $logger;
        $this->storage = $storage;
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
                sprintf("User: '%s' produces message: '%s' in: '%s'", $recipient, $message, $this->storage)
            );
        }

        return true;
    }
}