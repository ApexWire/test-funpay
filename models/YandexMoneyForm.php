<?php

namespace app\models;

use yii\web\ServerErrorHttpException;
use Yii;
use yii\base\Model;

/**
 * Class YandexMoneyForm
 * @package app\models
 */
class YandexMoneyForm extends Model
{
    /** @type string Сообщение */
    public $sms;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sms'], 'required'],
            [['sms'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sms' => 'Сообщение',
        ];
    }

    public function parseSms()
    {
        preg_match('/([0-9]{4,8})/', $this->sms, $password);
        echo "<pre>";
        print_r($password);
        echo "</pre>";

        preg_match('/([0-9]{1,},?[0-9]{0,2}р.)/', $this->sms, $money);
        echo "<pre>";
        print_r($money);
        echo "</pre>";


        preg_match('/(4100[0-9]{10,})/', $this->sms, $purse);

        echo "<pre>";
        print_r($purse);
        echo "</pre>";

        die();
    }
}
