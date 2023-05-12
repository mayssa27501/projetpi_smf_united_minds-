<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/article' => [[['_route' => 'app_article_index', '_controller' => 'App\\Controller\\ArticleController::index'], null, ['GET' => 0], null, true, false, null]],
        '/article/lesarticles' => [[['_route' => 'app_article_indexFront', '_controller' => 'App\\Controller\\ArticleController::indexFront'], null, ['GET' => 0], null, false, false, null]],
        '/article/new' => [[['_route' => 'app_article_new', '_controller' => 'App\\Controller\\ArticleController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/article/pdf/evenement' => [[['_route' => 'generator_service', '_controller' => 'App\\Controller\\ArticleController::pdfEvenement'], null, null, null, false, false, null]],
        '/categorie/article' => [[['_route' => 'app_categorie_article_index', '_controller' => 'App\\Controller\\CategorieArticleController::index'], null, ['GET' => 0], null, true, false, null]],
        '/categorie/article/new' => [[['_route' => 'app_categorie_article_new', '_controller' => 'App\\Controller\\CategorieArticleController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/article/([^/]++)(?'
                    .'|(*:27)'
                    .'|/edit(*:39)'
                    .'|(*:46)'
                .')'
                .'|/categorie/article/([^/]++)(?'
                    .'|(*:84)'
                    .'|/edit(*:96)'
                    .'|(*:103)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:140)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [[['_route' => 'app_article_show', '_controller' => 'App\\Controller\\ArticleController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        39 => [[['_route' => 'app_article_edit', '_controller' => 'App\\Controller\\ArticleController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        46 => [[['_route' => 'app_article_delete', '_controller' => 'App\\Controller\\ArticleController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        84 => [[['_route' => 'app_categorie_article_show', '_controller' => 'App\\Controller\\CategorieArticleController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        96 => [[['_route' => 'app_categorie_article_edit', '_controller' => 'App\\Controller\\CategorieArticleController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        103 => [[['_route' => 'app_categorie_article_delete', '_controller' => 'App\\Controller\\CategorieArticleController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        140 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
