<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Tags\Widget;

use Gm;
use Gm\Panel\Helper\ExtGrid;
use Gm\Panel\Helper\HtmlGrid;
use Gm\Panel\Helper\HtmlNavigator as HtmlNav;

/**
 * Виджет для формирования интерфейса вкладки с сеткой данных.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Tags\Widget
 * @since 1.0
 */
class TabGrid extends \Gm\Panel\Widget\TabGrid
{
    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        // столбцы (Gm.view.grid.Grid.columns GmJS)
        $this->grid->columns = [
            ExtGrid::columnNumberer(),
            ExtGrid::columnAction(),
            [
                'text'      => ExtGrid::columnInfoIcon($this->creator->t('Name')),
                'dataIndex' => 'name',
                'cellTip'   => HtmlGrid::tags([
                    HtmlGrid::header('{name}'),
                    HtmlGrid::tplIf(
                        'desc',
                        HtmlGrid::fieldLabel($this->creator->t('Description'), '{desc}'),
                        ''
                    ),
                    HtmlGrid::fieldLabel($this->creator->t('Slug'), '{slug}'),
                    HtmlGrid::fieldLabel($this->creator->t('Hits'), '{hits}'),
                    HtmlGrid::fieldLabel($this->creator->t('Count of articles containing the tag'), '{articles}'),
                    HtmlGrid::tplIf(
                        'language',
                        HtmlGrid::fieldLabel($this->creator->t('Language'), '{language}'),
                        ''
                    ),
                    HtmlGrid::fieldLabel(
                        $this->creator->t('Visible'),
                        HtmlGrid::tplChecked('visible==1')
                    )
                ]),
                'filter'   => ['type' => 'string'],
                'sortable' => true,
                'width'    => 170
            ],
            [
                'text'      => '#Slug',
                'dataIndex' => 'slug',
                'tooltip'   => '#A slug is a version of the title, a unique part of the URL. It is all lowercase and only Latin letters, numbers, and hyphens. If not specified, it will be created automatically from the name.',
                'cellTip'   => '{slug}',
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 170
            ],
            [
                'text'      => '#Description',
                'dataIndex' => 'desc',
                'cellTip'   => '{desc}',
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 220
            ],
            [
                'text'      => '#Language',
                'dataIndex' => 'language',
                'width'     => 120
            ],
            [
                'xtype'    => 'templatecolumn',
                'dataIndex' => 'url', // не используется, но необходим для проверки
                'sortable' => false,
                'width'    => 45,
                'align'    => 'center',
                'tpl'      => HtmlGrid::a(
                    '', 
                    '/tag/{slug}',
                    [
                        'title' => $this->creator->t('View tag'),
                        'class' => 'g-icon g-icon-svg g-icon_size_14 g-icon-m_link g-icon-m_color_default g-icon-m_is-hover',
                        'target' => '_blank'
                    ]
                )
            ],
            [
                'text'      => ExtGrid::columnIcon('gm-tags__icon-hits', 'svg'),
                'dataIndex' => 'hits',
                'filter'    => ['type' => 'number'],
                'tooltip'   => '#Count of views',
                'align'     => 'center',
                'width'     => 50
            ],
            [
                'text'      => ExtGrid::columnIcon('gm-tags__icon-articles', 'svg', 16, ''),
                'dataIndex' => 'articles',
                'filter'    => ['type' => 'number'],
                'tooltip'   => '#Count of articles containing the tag',
                'align'     => 'center',
                'width'     => 50
            ],
            [
                'text'      => ExtGrid::columnIcon('g-icon-m_visible', 'svg'),
                'xtype'     => 'g-gridcolumn-switch',
                'filter'    => ['type' => 'boolean'],
                'tooltip'   => '#Show / hide tag',
                'selector'  => 'grid',
                'collectData' => ['name'],
                'dataIndex' => 'visible'
            ]
        ];

        // панель инструментов (Gm.view.grid.Grid.tbar GmJS)
        $this->grid->tbar = [
            'padding' => 1,
            'items'   => ExtGrid::buttonGroups([
                'edit' => [
                    'items' => [
                        // инструмент "Добавить"
                        'add' => [
                            //'caching' => false
                        ],
                        'delete',
                        'cleanup',
                        '-',
                        'edit',
                        'select',
                        '-',
                        'refresh'
                    ]
                ],
                'columns',
                'search'
            ])
        ];

        // контекстное меню записи (Gm.view.grid.Grid.popupMenu GmJS)
        $this->grid->popupMenu = [
            'cls'        => 'g-gridcolumn-popupmenu',
            'titleAlign' => 'center',
            'width'      => 150,
            'items'      => [
                [
                    'text'        => '#Edit record',
                    'iconCls'     => 'g-icon-svg g-icon-m_edit g-icon-m_color_default',
                    'handlerArgs' => [
                        'route'   => Gm::alias('@match', '/form/view/{id}'),
                        'pattern' => 'grid.popupMenu.activeRecord'
                    ],
                    'handler' => 'loadWidget'
                ]
            ]
        ];

        // 2-й клик по строке сетки
        $this->grid->rowDblClickConfig = [
            'allow' => true,
            'route' => Gm::alias('@match', '/form/view/{id}')
        ];
        // количество строк в сетке
        $this->grid->store->pageSize = 50;
        // поле аудита записи
        $this->grid->logField = 'name';
        // плагины сетки
        $this->grid->plugins = 'gridfilters';
        // класс CSS применяемый к элементу body сетки
        $this->grid->bodyCls = 'g-grid_background';

        // панель навигации (Gm.view.navigator.Info GmJS)
        $this->navigator->info['tpl'] = HtmlNav::tags([
            HtmlNav::header('{name}'),
            HtmlNav::tplIf(
                'desc',
                HtmlNav::fieldLabel($this->creator->t('Description'), '{desc}'),
                ''
            ),
            HtmlNav::fieldLabel($this->creator->t('Slug'), '{slug}'),
            HtmlNav::fieldLabel($this->creator->t('Hits'), '{hits}'),
            HtmlNav::fieldLabel($this->creator->t('Count of articles containing the tag'), '{articles}'),
            HtmlNav::tplIf(
                'language',
                HtmlNav::fieldLabel($this->creator->t('Language'), '{language}'),
                ''
            ),
            HtmlNav::fieldLabel(
                $this->creator->t('Visible'),
                HtmlNav::tplChecked('visible==1')
            ),
            HtmlNav::widgetButton(
                $this->creator->t('Edit record'),
                ['route' => Gm::alias('@match', '/form/view/{id}'), 'long' => true],
                ['title' => $this->creator->t('Edit record')]
            )
        ]);

        $this
            ->addCss('/grid.css')
            ->addRequire('Gm.view.grid.column.Switch');
    }
}
