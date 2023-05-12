<?php

namespace ContainerEGpcb5a;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNotifier_Channel_EmailService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'notifier.channel.email' shared service.
     *
     * @return \Symfony\Component\Notifier\Channel\EmailChannel
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Channel'.\DIRECTORY_SEPARATOR.'ChannelInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Channel'.\DIRECTORY_SEPARATOR.'EmailChannel.php';

        $a = ($container->services['messenger.default_bus'] ?? $container->load('getMessenger_DefaultBusService'));

        if (isset($container->privates['notifier.channel.email'])) {
            return $container->privates['notifier.channel.email'];
        }

        return $container->privates['notifier.channel.email'] = new \Symfony\Component\Notifier\Channel\EmailChannel(NULL, $a, NULL);
    }
}
