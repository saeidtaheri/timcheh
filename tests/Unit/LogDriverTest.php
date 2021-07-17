<?php

namespace App\Tests\Unit;

use App\Contract\NotificationDriverInterface;
use App\Driver\LogDriver;
use PHPUnit\Framework\TestCase;

class LogDriverTest extends TestCase
{
    public function test_log_is_a_notification_driver()
    {
        $driver = \Mockery::mock(LogDriver::class);
        $driver->shouldReceive('recipients')->andReturn($driver);
        $driver->shouldReceive('send')->andReturn(true);

        $this->assertInstanceOf(NotificationDriverInterface::class, $driver);
        $this->assertTrue($driver->send('Hello World'));
    }
}