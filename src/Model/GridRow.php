<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Tags\Model;

use Gm;
use Gm\Panel\Data\Model\FormModel;

/**
 * Модель данных профиля записи метки материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Tags\Model
 * @since 1.0
 */
class GridRow extends FormModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName'  => '{{tag}}',
            'primaryKey' => 'id',
            'fields'     => [
                ['id'],
                ['name'],
                ['visible']
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_AFTER_SAVE, function ($isInsert, $columns, $result, $message) {
                /** @var \Gm\Panel\Http\Response $response */
                $response = $this->response();
                // всплывающие сообщение
                if ($message['success']) {
                    $response
                        ->meta
                            ->cmdPopupMsg(
                                $this->module->t('Tag «{0}» - ' . ($this->visible > 0 ? 'showen' : 'hidden'), [$this->name]),
                                $this->t($this->visible > 0 ? 'Show' : 'Hide'),
                                'accept'
                            );
                } else
                    $response
                        ->meta
                            ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
            });
    }
}
