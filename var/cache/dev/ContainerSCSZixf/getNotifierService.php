<?php

namespace ContainerSCSZixf;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNotifierService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'notifier' shared service.
     *
     * @return \Symfony\Component\Notifier\Notifier
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'NotifierInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Notifier.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Channel'.\DIRECTORY_SEPARATOR.'ChannelPolicyInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Channel'.\DIRECTORY_SEPARATOR.'ChannelPolicy.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Recipient'.\DIRECTORY_SEPARATOR.'RecipientInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Recipient'.\DIRECTORY_SEPARATOR.'EmailRecipientInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Recipient'.\DIRECTORY_SEPARATOR.'SmsRecipientInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Recipient'.\DIRECTORY_SEPARATOR.'EmailRecipientTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Recipient'.\DIRECTORY_SEPARATOR.'SmsRecipientTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'notifier'.\DIRECTORY_SEPARATOR.'Recipient'.\DIRECTORY_SEPARATOR.'Recipient.php';

        $container->privates['notifier'] = $instance = new \Symfony\Component\Notifier\Notifier(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'browser' => ['privates', 'notifier.channel.browser', 'getNotifier_Channel_BrowserService', true],
            'chat' => ['privates', 'notifier.channel.chat', 'getNotifier_Channel_ChatService', true],
            'email' => ['privates', 'notifier.channel.email', 'getNotifier_Channel_EmailService', true],
            'push' => ['privates', 'notifier.channel.push', 'getNotifier_Channel_PushService', true],
            'sms' => ['privates', 'notifier.channel.sms', 'getNotifier_Channel_SmsService', true],
        ], [
            'browser' => 'Symfony\\Component\\Notifier\\Channel\\BrowserChannel',
            'chat' => 'Symfony\\Component\\Notifier\\Channel\\ChatChannel',
            'email' => 'Symfony\\Component\\Notifier\\Channel\\EmailChannel',
            'push' => 'Symfony\\Component\\Notifier\\Channel\\PushChannel',
            'sms' => 'Symfony\\Component\\Notifier\\Channel\\SmsChannel',
        ]), new \Symfony\Component\Notifier\Channel\ChannelPolicy(['urgent' => [0 => 'email'], 'high' => [0 => 'email'], 'medium' => [0 => 'email'], 'low' => [0 => 'email']]));

        $instance->addAdminRecipient(new \Symfony\Component\Notifier\Recipient\Recipient('admin@example.com', ''));

        return $instance;
    }
}
