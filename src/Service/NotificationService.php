<?php

namespace App\Service;

use App\Contract\NotificationDriverInterface;

class NotificationService
{
    protected $drivers;

    public function addDriver(NotificationDriverInterface $driver)
    {
        $this->drivers[] = $driver;
    }

    public function send(string $type, string $message, array $users) : bool
    {
        foreach ($this->drivers as $driver)
        {
            if ($driver->isLoggable($type)) {
                 return $driver
                     ->recipients($users)
                     ->send($message);
            }
        }

        throw new \InvalidArgumentException('Driver not found');
    }
}