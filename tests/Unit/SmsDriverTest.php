<?php

namespace App\Tests\Unit;

use App\Contract\NotificationDriverInterface;
use App\Driver\SmsDriver;
use PHPUnit\Framework\TestCase;

class SmsDriverTest extends TestCase
{
    public function test_sms_is_a_notification_driver()
    {
        $driver = \Mockery::mock(SmsDriver::class);
        $driver->shouldReceive('recipients')->andReturn($driver);
        $driver->shouldReceive('send')->andReturn(true);

        $this->assertInstanceOf(NotificationDriverInterface::class, $driver);
        $this->assertTrue($driver->send('Hello World'));
    }
}