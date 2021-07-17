<?php

namespace App\Driver;

use App\Contract\NotificationDriverInterface;
use Psr\Log\LoggerInterface;

class SmsDriver implements NotificationDriverInterface
{
    protected $apikey;
    protected $domain;
    protected $logger;
    protected $recipients = [];

    public function __construct(string $apikey, string $domain, LoggerInterface $logger)
    {
        if(!$this->checkApi($apikey))
            throw new \InvalidArgumentException("API key is Not Valid");

        $this->apikey = $apikey;
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
                sprintf("sending message '%s' to '%s' in: '%s'", $message, $recipient, $this->domain)
            );
        }

        // send sms in queue in real world

        return true;
    }

    private function checkApi($key): bool
    {
        return strlen($key) > 0;
    }
}