<?php

namespace ContainerEGpcb5a;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Mq0H65vService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.mq0H65v' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.mq0H65v'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'articleRepository' => ['privates', 'App\\Repository\\ArticleRepository', 'getArticleRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', true],
            'mailer' => ['privates', 'App\\Service\\MailerService', 'getMailerServiceService', true],
            'notifier' => ['privates', 'notifier', 'getNotifierService', true],
            'slugger' => ['privates', 'slugger', 'getSluggerService', true],
        ], [
            'articleRepository' => 'App\\Repository\\ArticleRepository',
            'entityManager' => '?',
            'mailer' => 'App\\Service\\MailerService',
            'notifier' => '?',
            'slugger' => '?',
        ]);
    }
}
