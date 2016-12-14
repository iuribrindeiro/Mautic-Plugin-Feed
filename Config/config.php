<?php

use MauticPlugin\FeedNoticiasBannetBundle\EventListener\FeedSubscriber;
use MauticPlugin\FeedNoticiasBannetBundle\Model\NoticiasEnviadasModel;

return [
    'name' => 'Feed Noticias Bannet',
    'version' => '4.4',
    'author' => 'Iuri',
    'description' => 'Envia email de notícias blog bannet',

    'services' => [
        'events' => [
            'plugin.feednoticiasbannet.feed.subscriber' => [
                'class' => FeedSubscriber::class,
                'arguments' => [
                    'plugin.noticiasenviadas.model'
                ]
            ]
        ],
        'models' => [
            'plugin.noticiasenviadas.model' => [
                'class' => NoticiasEnviadasModel::class,
                'arguments' => [
                    'mautic.factory'
                ]
            ]
        ]
    ]
];