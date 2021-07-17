<?php

namespace App\Contract;

interface NotificationDriverInterface
{
    public function recipients(array $recipients) : NotificationDriverInterface;

    public function send(string $message) : bool;
}