<?php

namespace Brezgalov\ArrayableApiFields;

use yii\base\Behavior;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;

class ArrayableApiFieldsBehaviour extends Behavior
{
    /**
     * @var string|string[]
     */
    public $fields;

    /**
     * @var string
     */
    public $separator = ',';

    /**
     * @return string[]
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'prepareFields',
        ];
    }

    /**
     * @param ModelEvent $event
     */
    public function prepareFields(ModelEvent $event)
    {
        if (empty($this->fields)) {
            return;
        }

        if (!is_array($this->fields)) {
            $this->fields = [$this->fields];
        }

        $model = &$event->sender;
        foreach ($this->fields as $field) {
            if ($model->{$field}) {
                $model->{$field} = explode($this->separator, $model->{$field});
            }
        }
    }
}