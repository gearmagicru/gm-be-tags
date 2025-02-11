<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * Пакет английской (британской) локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Tag manager',
    '{description}' => 'Managing site content tags',
    '{permissions}' => [
        'any'       => ['Full access', 'View and make changes to the tags'],
        'view'      => ['View', 'Reading tags'],
        'read'      => ['Reading', 'Reading tags'],
        'add'       => ['Adding', 'Adding tags'],
        'edit'      => ['Editing', 'Editing tags'],
        'delete'    => ['Deleting', 'Deleting tags'],
        'clear'     => ['Clear', 'Deleting all tags']
    ],

    // Form
    '{form.title}' => 'Add tag',
    '{form.titleTpl}' => 'Edit tag "{title}"',
    // Form: поля
    'visible' => 'visible',

     // Grid: контекстное меню записи
     'Edit record' => 'Edit record',
     // Grid: панель навигации
     'Update' => 'Update',
     // Grid: столбцы
     'Index number' => 'Index number',
     'Index' => '№',
     'Icon' => 'Icon',
     'Icon / Image' => 'Icon / Image',
     'Icon element' => 'Icon element',
     'Title' => 'Title',
     'Image' => 'Image',
     'Css' => 'Icon CSS',
     'Yes' => 'yes',
     'No' => 'no',
     'Visible' => 'Visible',
     'Name' => 'Name',
     'Handler' => 'Handler',
     'Menu item handler' => 'Menu item handler',
     'Handler name' => 'The name of the click handler on the notification bar element (function name JavaScript)',
     'Arguments' => 'Arguments',
     'Arguments handler' => 'Handler arguments are separated ";"<br>example: url=http://domain.com/;action=open',
     'Roles' => 'Roles',
     'Show / hide element' => 'Show / hide element',
     // Grid: сообщения
     'Traybar element for user role {0} - enabled' => 'Traybar element for user role "<b>{0}</b>" - <b>enabled</b>.',
     'Traybar element for user role {0} - disabled' => 'Traybar element for user role "<b>{0}</b>" - <b>disabled</b>.',
     'Traybar element for user role {0} is enabled' => 'Traybar element for user role "<b>{0}</b>" is enabled',
     'Traybar element for user role {0} is disabled' => 'Traybar element for user role "<b>{0}</b>" is disabled',
     // Grid: сообщения / заголовки
     'Show' => 'Show',
     'Hide' => 'Hide',
     'Show / Hide' => 'Show / Hide',
     // Grid: аудит
     'opening a window for viewing user roles available to the traybar {0}' => 'opening a window for viewing user roles available to the traybar "<b>{0}</b>"',
     'viewing user roles available to the traybar {0}' => 'viewing user roles available to the traybar "<b>{0}</b>"',
 
     // RolesGrid: доступ уведомлениям
     '{roles.title}' => 'Access to traybar items "{0}" for user roles',
     'Access to the traybar' => 'Access to the traybar',
     // RolesGrid: столбцы
     'Traybar roles' => 'Traybar roles',
     'User role availability' => 'User role availability',
     // RolesGrid: сообщения
     'Notification area element {0} - hide' => 'Notification area element "<b>{0}</b>" - <b>hide</b>.',
     'Notification area element {0} - show' => 'Notification area element "<b>{0}</b>" - <b>show</b>.',
     // RolesGrid: аудит
     'notification area element {0} is hidden' => 'notification area element "<b>{0}</b>" is hidden',
     'notification area element {0} is shown' => 'notification area element "<b>{0}</b>" is shown',
 
     // Workspace\Panel: для названий элементов панели по умолчанию (с символа "#")
     'Exit' => 'Exit',
     'Dashboard' => 'Dashboard',
     'Debugger toolbar' => 'Debugger toolbar',
     'Audit Log' => 'Audit Log',
     'User account' => 'User account'
];
