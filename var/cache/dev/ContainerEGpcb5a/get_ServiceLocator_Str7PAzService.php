<?php

namespace ContainerEGpcb5a;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Str7PAzService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Str7PAz' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Str7PAz'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'article' => ['privates', '.errored..service_locator.Str7PAz.App\\Entity\\Article', NULL, 'Cannot autowire service ".service_locator.Str7PAz": it references class "App\\Entity\\Article" but no such service exists.'],
            'articleRepository' => ['privates', 'App\\Repository\\ArticleRepository', 'getArticleRepositoryService', true],
            'notifier' => ['privates', 'notifier', 'getNotifierService', true],
        ], [
            'article' => 'App\\Entity\\Article',
            'articleRepository' => 'App\\Repository\\ArticleRepository',
            'notifier' => '?',
        ]);
    }
}
