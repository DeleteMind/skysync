<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- vai buscar as constantes definidas ao common/models/user -->
    <?= $form->field($model, 'status')->dropDownList([
        User::STATUS_ACTIVE => 'Ativo',
        User::STATUS_INACTIVE => 'Inativo',
        User::STATUS_DELETED => 'Apagado',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
