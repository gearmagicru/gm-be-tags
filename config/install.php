<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации установки модуля.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c] 2015 Этот файл является частью модуля веб-приложения GearMagic. Web-студия
 * @license https://gearmagic.ru/license/
 */

return [
    'use'         => BACKEND,
    'id'          => 'gm.be.tags',
    'name'        => 'Tag manager',
    'description' => 'Managing site content tags',
    'namespace'   => 'Gm\Backend\Tags',
    'path'        => '/gm/gm.be.tags',
    'route'       => 'tag-manager',
    'routes'      => [
        [
            'type'    => 'crudSegments',
            'options' => [
                'module'      => 'gm.be.tags',
                'route'       => 'tag-manager',
                'prefix'      => BACKEND,
                'constraints' => ['id'],
                'defaults'    => [
                    'controller' => [
                        'default' => 'grid'
                    ]
                ]
            ]
        ]
    ],
    'locales'     => ['ru_RU', 'en_GB'],
    'permissions' => ['any', 'view', 'read', 'add', 'edit', 'delete', 'clear', 'info'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM CMS']
    ]
];
