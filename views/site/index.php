<?php

use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YandexMoneyForm */

$this->title = 'My Yii Application';

$this->registerJs(<<<JS

function viewResultInModal(url) {
    $('#modal').modal('show');
    $('#modal .modal-body').load(url, function(response, status) {
        if (status == 'error') {
            $('#modal .modal-body').html('<div class="alert alert-danger">При запросе к серверу произошла ошибка: <br/><strong>'+response+'</strong></div>');
        }

        return response;
    });
}
JS
    , View::POS_HEAD);
?>
<div class="site-index">
    <div class="body-content">
        <h2>Первое тестовое задание!</h2>
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-12"><?= $form->field($model, 'sms')->textarea([
                    'rows' => '5',
                    'style' => 'resize: none'
                ]) ?></div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="body-content">
        <h2>Второе тестовое задание!</h2>
        <p>Примеры ссылок:</p>
        <ul>
            <li>/index.php?r=api%2Ffail - несуществующая страница</li>
            <li>/index.php?r=api%2Fhtml - страница, возвращающая данные в формате html (часть html)</li>
        </ul>
        <div class="row">
            <div class="col-lg-9">
                <?= Html::textInput('url', '', ['class' => 'form-control']); ?>
            </div>
            <div class="col-lg-3">
                <?= Html::button('Открыть ссылку',
                    ['class' => 'btn btn-primary', 'onclick' => 'viewResultInModal($(\'input[name=url]\').val())']) ?>
            </div>
        </div>
    </div>
</div>

<div class="site-index-modal">
    <?php yii\bootstrap\Modal::begin([
        'id' => 'modal',
        'size' => 'modal-lg',
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
    ]); ?>
    <div style="text-align:center"><img src="/img/ajax-loader.gif"></div>
    <?php yii\bootstrap\Modal::end(); ?>
</div>
