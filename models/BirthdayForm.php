<?php

namespace app\models;

use yii\base\Model;

class BirthdayForm extends Model
{
    public $name;
    public $date;
    public $id;
    public $sates;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['id', 'required'],
            ['sates', 'required'],
            ['date', 'required'],
            ['date', 'date', 'format' => 'php:Y-m-d'],
        ];
    }
}

?>