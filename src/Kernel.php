<?php

namespace App;

use App\DependencyInjection\Compiler\NotificationCompilerPass;
use App\Service\NotificationService;
use SebastianBergmann\Diff\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/services.yaml')) {
            $container->import('../config/services.yaml');
            $container->import('../config/{services}_'.$this->environment.'.yaml');
        } else {
            $container->import('../config/{services}.php');
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/{routes}/'.$this->environment.'/*.yaml');
        $routes->import('../config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import('../config/routes.yaml');
        } else {
            $routes->import('../config/{routes}.php');
        }
    }

    public function process(ContainerBuilder $container)
    {
        $driver = 'App\Driver\\' . $_ENV['NOTIFICATION_DRIVER'] .'Driver';

        $notificationDefinition = $container->getDefinition(NotificationService::class);

        if(!class_exists($driver))
            throw new InvalidArgumentException('Invalid Notification Driver!');

        $notificationDefinition->addArgument(new Reference($driver));
    }

    protected function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new NotificationCompilerPass());
    }
}
