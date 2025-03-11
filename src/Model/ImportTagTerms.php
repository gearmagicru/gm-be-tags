<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Tags\Model;

/**
 * Импорт меток (тегов) терминов.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Tags\Model
 * @since 1.0
 */
class ImportTagTerms extends \Gm\Import\Import
{
    /**
     * {@inheritdoc}
     */
    protected string $modelClass = '\Gm\Backend\Tags\Model\TagTerms';

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            // идентификатор связываемой записи
            'id' => [
                'field' => 'id', 
                'type' => 'int'
            ],
            // идентификатор метки (тега)
            'tag_id' => [
                'field' => 'tag_id', 
                'type'  => 'int'
            ],
            // идентификатор термина
            'term_id' => [
                'field' => 'term_id', 
                'type'  => 'int'
            ],
            // идентификатор группы
            'group_id' => [
                'field' => 'group_id', 
                'type'  => 'int'
            ]
        ];
    }
}
