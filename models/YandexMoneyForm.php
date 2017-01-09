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

    /**
     * Функция разбора сообщения
     *
     * @return array
     */
    public function parseSms()
    {
        $code = $money = $purse = null;
        preg_match('/([0-9]{4,8})/', $this->sms, $matches);
        if (isset($matches[1])) {
            $code = $matches[1];
        }

        preg_match('/([0-9]{1,}([,|.][0-9]{0,2})?р.)/', $this->sms, $matches);
        if (isset($matches[1])) {
            $money = str_replace('р.', '', $matches[1]);
        }

        preg_match('/(4100[0-9]{10,})/', $this->sms, $matches);
        if (isset($matches[1])) {
            $purse = $matches[1];
        }

        return [
            'code' => $code,
            'money' => $money,
            'purse' => $purse,
        ];
    }
}
