<?php

namespace App\Tests\Unit;

use App\Driver\EmailDriver;
use PHPUnit\Framework\TestCase;
use App\Service\NotificationService;

class NotificationTest extends TestCase
{
    public function test_send_notification_with_email_driver()
    {
        $driver = new EmailDriver();
        $notificationMock = \Mockery::mock(NotificationService::class);

        $notificationMock
            ->shouldReceive('addDriver')
            ->once()
            ->with($driver);

        $notificationMock
            ->shouldReceive('send')
            ->once()
            ->with('Email', 'Hello', ['saeid'])
            ->andReturn(true);

        $notificationMock->addDriver($driver);

        $this->assertTrue($notificationMock->send('Email','Hello', ['saeid']));
    }

    public function tearDown():void
    {
        \Mockery::close();
    }
}