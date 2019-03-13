<?php
// namespace app\controllers;
// use Yii;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
?>

<?php
$dataProvider = new ArrayDataProvider([
    'key'=>'id',
    'allModels' => $birthdays,
    'sort' => [
        'attributes' => ['id', 'name', 'birthday'],
    ],
]);
?>

<?php
Modal::begin([
    'header' => Html::tag('h2', Html::tag('p', 'Create', ['class' => 'text-primary'])),
    'id' => 'widlet666',
    'toggleButton' => [
        'label' => '➕',
        'tag' => 'button',
        'class' => 'btn btn-warning btn-block',
    ],
]); ?>
    <?php echo '<div id="author"></div><div id="name"></div>';?>
    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/new'], 'method' => 'post']); ?>
        <?= $form->field($model, 'name')->textInput([])->hint('Пожалуйста, введите имя')->label('Имя'); ?>
        <?= $form->field($model, 'date')->textInput(['type' => "date"])->hint('Пожалуйста, введите дату')->label('Дата');?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>
<?php Modal::end();?>

<?php foreach ($birthdays as $birthday): ?>
    <?php
    Modal::begin([
            'header' => Html::tag('h2', Html::tag('p', 'Edit', ['class' => 'text-primary'])),
            'id' => 'widlet'.$birthday['id'].'Edit',
        ]); ?>
        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/edit'], 'method' => 'post']); ?>
            <?= $form->field($model, 'id')->textInput(['value' => $birthday['id'], 'readonly'=> true])->label('ID'); ?>
            <?= $form->field($model, 'name')->textInput(['value' => $birthday['name']])->hint('Пожалуйста, введите имя')->label('Имя'); ?>
            <?= $form->field($model, 'date')->textInput(['type' => "date", 'value' => $birthday['birthday']])->hint('Пожалуйста, введите дату')->label('Дата');?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>

    <?php
    Modal::begin([
            'header' => Html::tag('h2', Html::tag('p', 'Delete', ['class' => 'text-primary'])),
            'id' => 'widlet'.$birthday['id'].'Delete',
        ]);?>
        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/delete'], 'method' => 'post']); ?>
            <?= $form->field($model, 'id')->textInput(['value' => $birthday['id'], 'readonly'=> true])->label('ID'); ?>
            <?= $form->field($model, 'name')->textInput(['value' => $birthday['name'], 'readonly'=> true])->label('Имя'); ?>
            <?= $form->field($model, 'date')->textInput(['type' => "date", 'value' => $birthday['birthday'], 'readonly'=> true])->label('Дата');?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <?php Modal::end();?>
<?php endforeach; ?>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'name',
                'value' => 'name',
            ],
            [
                'attribute' => 'birthday',
                'value' => 'birthday',
                'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                       $options = [
                           'title' => Yii::t('yii', 'update'),
                           'aria-label' => Yii::t('yii', 'update'),
                           'data-toggle' => Yii::t('yii', 'modal'),
                           'data-target' => Yii::t('yii', '#widlet'.$key.'Edit'),
                       ];
                       return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'delete'),
                            'aria-label' => Yii::t('yii', 'delete'),
                            'data-toggle' => Yii::t('yii', 'modal'),
                            'data-target' => Yii::t('yii', '#widlet'.$key.'Delete'),
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    }
                ]
            ],
    ]]); ?>
<?php Pjax::end(); ?>

<script>
$("body").on("click", "a[href*='site/delete']", function(e){   
    $.ajax({
        url: this,                             
        dataType : "json",                     
        success: function (data) {                
            $(".modal-body #name").html(data.name);
        }
    });
});
</script>
