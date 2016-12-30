<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YandexMoneyForm */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <h2>Первое тестовое задание!</h2>
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-12"><?= $form->field($model, 'sms')->textarea(['style' => 'resize: none']) ?></div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
