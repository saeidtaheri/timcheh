<?php

namespace App\Tests\Unit;

use App\Contract\NotificationDriverInterface;
use App\Driver\EmailDriver;
use PHPUnit\Framework\TestCase;

class EmailDriverTest extends TestCase
{
    public function test_email_is_a_notification_driver()
    {
        $driver = \Mockery::mock(EmailDriver::class);
        $driver->shouldReceive('recipients')->andReturn($driver);
        $driver->shouldReceive('send')->andReturn(true);

        $this->assertInstanceOf(NotificationDriverInterface::class, $driver);
        $this->assertTrue($driver->send('Hello World'));
    }
}