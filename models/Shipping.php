<?php


namespace app\models;


use yii\db\ActiveRecord;

class Shipping extends ActiveRecord
{
    public static function tableName()
    {
        return "shipping";
    }


}