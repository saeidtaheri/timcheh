<?php

namespace App\Service;

use App\Contract\NotificationDriverInterface;

class NotificationService
{
    protected $driver;

    public function __construct(NotificationDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function send(string $message, array $users) : bool
    {
        return $this->driver
            ->recipients($users)
            ->send($message);
    }
}