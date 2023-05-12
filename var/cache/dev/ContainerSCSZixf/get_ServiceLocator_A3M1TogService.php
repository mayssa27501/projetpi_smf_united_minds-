<?php

namespace ContainerSCSZixf;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_A3M1TogService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.A3M1Tog' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.A3M1Tog'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\ArticleController::delete' => ['privates', '.service_locator.Str7PAz', 'get_ServiceLocator_Str7PAzService', true],
            'App\\Controller\\ArticleController::edit' => ['privates', '.service_locator.Str7PAz', 'get_ServiceLocator_Str7PAzService', true],
            'App\\Controller\\ArticleController::index' => ['privates', '.service_locator.E2AflHD', 'get_ServiceLocator_E2AflHDService', true],
            'App\\Controller\\ArticleController::indexFront' => ['privates', '.service_locator.i9Y0h6B', 'get_ServiceLocator_I9Y0h6BService', true],
            'App\\Controller\\ArticleController::new' => ['privates', '.service_locator.mq0H65v', 'get_ServiceLocator_Mq0H65vService', true],
            'App\\Controller\\ArticleController::show' => ['privates', '.service_locator.NyLbAvG', 'get_ServiceLocator_NyLbAvGService', true],
            'App\\Controller\\CategorieArticleController::delete' => ['privates', '.service_locator.FfLt4RY', 'get_ServiceLocator_FfLt4RYService', true],
            'App\\Controller\\CategorieArticleController::edit' => ['privates', '.service_locator.FfLt4RY', 'get_ServiceLocator_FfLt4RYService', true],
            'App\\Controller\\CategorieArticleController::index' => ['privates', '.service_locator.NwdtbWm', 'get_ServiceLocator_NwdtbWmService', true],
            'App\\Controller\\CategorieArticleController::new' => ['privates', '.service_locator.NwdtbWm', 'get_ServiceLocator_NwdtbWmService', true],
            'App\\Controller\\CategorieArticleController::show' => ['privates', '.service_locator.Qmlhuw8', 'get_ServiceLocator_Qmlhuw8Service', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Controller\\ArticleController:delete' => ['privates', '.service_locator.Str7PAz', 'get_ServiceLocator_Str7PAzService', true],
            'App\\Controller\\ArticleController:edit' => ['privates', '.service_locator.Str7PAz', 'get_ServiceLocator_Str7PAzService', true],
            'App\\Controller\\ArticleController:index' => ['privates', '.service_locator.E2AflHD', 'get_ServiceLocator_E2AflHDService', true],
            'App\\Controller\\ArticleController:indexFront' => ['privates', '.service_locator.i9Y0h6B', 'get_ServiceLocator_I9Y0h6BService', true],
            'App\\Controller\\ArticleController:new' => ['privates', '.service_locator.mq0H65v', 'get_ServiceLocator_Mq0H65vService', true],
            'App\\Controller\\ArticleController:show' => ['privates', '.service_locator.NyLbAvG', 'get_ServiceLocator_NyLbAvGService', true],
            'App\\Controller\\CategorieArticleController:delete' => ['privates', '.service_locator.FfLt4RY', 'get_ServiceLocator_FfLt4RYService', true],
            'App\\Controller\\CategorieArticleController:edit' => ['privates', '.service_locator.FfLt4RY', 'get_ServiceLocator_FfLt4RYService', true],
            'App\\Controller\\CategorieArticleController:index' => ['privates', '.service_locator.NwdtbWm', 'get_ServiceLocator_NwdtbWmService', true],
            'App\\Controller\\CategorieArticleController:new' => ['privates', '.service_locator.NwdtbWm', 'get_ServiceLocator_NwdtbWmService', true],
            'App\\Controller\\CategorieArticleController:show' => ['privates', '.service_locator.Qmlhuw8', 'get_ServiceLocator_Qmlhuw8Service', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
        ], [
            'App\\Controller\\ArticleController::delete' => '?',
            'App\\Controller\\ArticleController::edit' => '?',
            'App\\Controller\\ArticleController::index' => '?',
            'App\\Controller\\ArticleController::indexFront' => '?',
            'App\\Controller\\ArticleController::new' => '?',
            'App\\Controller\\ArticleController::show' => '?',
            'App\\Controller\\CategorieArticleController::delete' => '?',
            'App\\Controller\\CategorieArticleController::edit' => '?',
            'App\\Controller\\CategorieArticleController::index' => '?',
            'App\\Controller\\CategorieArticleController::new' => '?',
            'App\\Controller\\CategorieArticleController::show' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\ArticleController:delete' => '?',
            'App\\Controller\\ArticleController:edit' => '?',
            'App\\Controller\\ArticleController:index' => '?',
            'App\\Controller\\ArticleController:indexFront' => '?',
            'App\\Controller\\ArticleController:new' => '?',
            'App\\Controller\\ArticleController:show' => '?',
            'App\\Controller\\CategorieArticleController:delete' => '?',
            'App\\Controller\\CategorieArticleController:edit' => '?',
            'App\\Controller\\CategorieArticleController:index' => '?',
            'App\\Controller\\CategorieArticleController:new' => '?',
            'App\\Controller\\CategorieArticleController:show' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
