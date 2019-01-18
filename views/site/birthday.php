<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
?>

<?php /* @var $model app\models\EditorForm */ ?>


<?php
    Modal::begin([
            'header' => '<h2><p class="text-primary">Edit</p></h2>',
            'toggleButton' => [
                'label' => '🖋',
                'tag' => 'button',
                'class' => 'btn btn-outline-light',
            ],
        ]); ?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
    
        <?= $form->field($model, 'date') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>


    <?php Modal::end(); ?>
<?php
    Modal::begin([
            'header' => '<h2><p class="text-primary">Delete</p></h2>',
            'toggleButton' => [
                'label' => '❌',
                'tag' => 'button',
                'class' => 'btn btn-outline-light',
            ],
        ]);
    Modal::end();
?>