<?php
// namespace app\controllers;
// use Yii;

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
?>

<table class="table table-hover">
    <thead class="thead">
        <tr class="bg-primary">
            <th scope="col">
                ID
                <a type="button" class="btn btn-primary" href="/index.php?r&message=up">
                      🔺
                </a>
                <a type="button" class="btn btn-primary" href="/index.php?r&message=down">
                    🔻
                </a>
            </th>
            <th scope="col">
                Name
                <a type="button" class="btn btn-primary" href="/index.php?r&message=up&button=name">
                    🔺
                </a>
                <a type="button" class="btn btn-primary" href="/index.php?r&message=down&button=name">
                    🔻
                </a>
            </th>
            <th scope="col">
                Birthday
                <a type="button" class="btn btn-primary" href="/index.php?r&message=up&button=birthday">
                    🔺
                </a>
                <a type="button" class="btn btn-primary" href="/index.php?r&message=down&button=birthday">
                    🔻
                </a>
            </th>
            <th scope="col">
                <?php
                    Modal::begin([
                            'header' => '<h2><p class="text-primary">Create</p></h2>',
                            'toggleButton' => [
                                'label' => '➕',
                                'tag' => 'button',
                                'class' => 'btn btn-warning btn-block',
                            ],
                        ]); ?>
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <?= $form->field($model, 'sates')->textInput(['value' => 'new', 'readonly'=> true])->label('Статус');?>
                            <?= $form->field($model, 'name')->textInput([])->hint('Пожалуйста, введите имя')->label('Имя'); ?>
                            <?= $form->field($model, 'date')->textInput(['type' => "date"])->hint('Пожалуйста, введите дату')->label('Дата');?>
                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    <?php Modal::end(); 
                ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($birthdays as $birthday): ?>
            <tr>
                <td class="col-md-2"><?= Html::encode("{$birthday['id']}") ?></td>
                <td><?= Html::encode("{$birthday['name']}") ?></td>
                <td><?= $birthday['birthday'] ?></td>
                <td class="col-sm-2">
                    <?php
                        Modal::begin([
                                'header' => '<h2><p class="text-primary">Edit</p></h2>',
                                'toggleButton' => [
                                    'label' => '🖋',
                                    'tag' => 'button',
                                    'class' => 'btn btn-outline-light',
                                ],
                            ]); ?>
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
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
                                'header' => '<h2><p class="text-primary">Delete</p></h2>',
                                'toggleButton' => [
                                    'label' => '❌',
                                    'tag' => 'button',
                                    'class' => 'btn btn-outline-light',
                                ],
                            ]);?>
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                                <?= $form->field($model, 'id')->textInput(['value' => $birthday['id'], 'readonly'=> true])->label('ID'); ?>
                                <?= $form->field($model, 'sates')->textInput(['value' => 'delete', 'readonly'=> true])->label('Статус');?>
                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        <?php Modal::end();
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>