<?php

namespace SleepingOwl\Admin\Display\Column;

use KodiCMS\Assets\Contracts\MetaInterface;
use SleepingOwl\Admin\Contracts\ActionInterface;
use SleepingOwl\Admin\Contracts\AdminInterface;
use SleepingOwl\Admin\Contracts\Display\TableHeaderColumnInterface;

class Action extends NamedColumn implements ActionInterface
{
    /**
     * Action icon class.
     * @var string
     */
    protected $icon;

    /**
     * @var string
     */
    protected $style = 'long';

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $method = 'post';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $view = 'column.action';

    /**
     * Action constructor.
     *
     * @param \Closure|null|string $name
     * @param string|null $title
     * @param TableHeaderColumnInterface $tableHeaderColumn
     * @param AdminInterface $admin
     * @param MetaInterface $meta
     */
    public function __construct($name,
                                $title,
                                TableHeaderColumnInterface $tableHeaderColumn,
                                AdminInterface $admin,
                                MetaInterface $meta)
    {
        parent::__construct($name, null, $tableHeaderColumn, $admin, $meta);

        $this->setTitle($title);
    }

    public function initialize()
    {
        $this->setHtmlAttributes([
            'class' => 'btn btn-action btn-default',
            'name'  => 'action',
            'value' => $this->getName(),
            'data-action' => $this->getAction(),
            'data-method' => $this->getMethod(),
        ]);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return $this
     */
    public function useGet()
    {
        $this->method = 'get';

        return $this;
    }

    /**
     * @return $this
     */
    public function usePost()
    {
        $this->method = 'post';

        return $this;
    }

    /**
     * @return $this
     */
    public function usePut()
    {
        $this->method = 'put';

        return $this;
    }

    /**
     * @return $this
     */
    public function useDelete()
    {
        $this->method = 'delete';

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return parent::toArray() + [
            'icon'   => $this->getIcon(),
            'action' => $this->getAction(),
            'method' => $this->getMethod(),
            'title'  => $this->getTitle(),
        ];
    }
}
