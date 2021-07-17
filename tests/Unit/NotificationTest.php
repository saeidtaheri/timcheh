<?php

namespace App\Tests\Unit;

use App\Driver\EmailDriver;
use App\Driver\LogDriver;
use App\Driver\SmsDriver;
use PHPUnit\Framework\TestCase;
use App\Service\NotificationService;

class NotificationTest extends TestCase
{
    public function test_send_notification_with_email_driver()
    {
        $driver = \Mockery::mock(EmailDriver::class);
        $driver->shouldReceive('recipients')->andReturn($driver);
        $driver->shouldReceive('send')->andReturn(true);

        $notification = new NotificationService($driver);

        $this->assertTrue($notification->send('Hello World', ['saeid', 'ahmad']));
    }

    public function test_send_notification_with_log_driver()
    {
        $driver = \Mockery::mock(LogDriver::class);
        $driver->shouldReceive('recipients')->andReturn($driver);
        $driver->shouldReceive('send')->andReturn(true);

        $notification = new NotificationService($driver);

        $this->assertTrue($notification->send('Hello World', ['saeid', 'ahmad']));
    }

    public function test_send_notification_with_sms_driver()
    {
        $driver = \Mockery::mock(SmsDriver::class);
        $driver->shouldReceive('recipients')->andReturn($driver);
        $driver->shouldReceive('send')->andReturn(true);

        $notification = new NotificationService($driver);

        $this->assertTrue($notification->send('Hello World', ['saeid', 'ahmad']));
    }
}