<?php

namespace App\DependencyInjection\Compiler;

use App\Service\NotificationService;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class NotificationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $notificationDefinition = $container->getDefinition(NotificationService::class);

        $tags = array_keys($container->findTaggedServiceIds('app.notification_driver'));

        foreach ($tags as $notification) {
            $notificationDefinition
                ->addMethodCall('addDriver', [new Reference($notification)]);
        }
    }
}