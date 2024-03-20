<?php

use app\forms\SnilsForm;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var SnilsForm $model */
?>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'snils')->textInput() ?>

<?= Html::submitButton() ?>

<?php ActiveForm::end() ?>
