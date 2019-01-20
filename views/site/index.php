<?php
// namespace app\controllers;
// use Yii;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
?>

<table class="table table-hover">
    <thead class="thead">
        <tr class="bg-primary">
            <th scope="col">
                ID
                <a type="button" class="btn btn-primary" href=<?php echo Url::to(['', 'message' => 'up']); ?>>
                      🔺
                </a>
                <a type="button" class="btn btn-primary" href=<?php echo Url::to(['', 'message' => 'down']); ?>>
                    🔻
                </a>
            </th>
            <th scope="col">
                Name
                <a type="button" class="btn btn-primary" href=<?php echo Url::to(['', 'message' => 'up', 'button' => 'name']); ?>>
                    🔺
                </a>
                <a type="button" class="btn btn-primary" href=<?php echo Url::to(['', 'message' => 'down', 'button' => 'name']); ?>>
                    🔻
                </a>
            </th>
            <th scope="col">
                Birthday
                <a type="button" class="btn btn-primary" href=<?php echo Url::to(['', 'message' => 'up', 'button' => 'birthday']); ?>>
                    🔺
                </a>
                <a type="button" class="btn btn-primary" href=<?php echo Url::to(['', 'message' => 'down', 'button' => 'birthday']); ?>>
                    🔻
                </a>
            </th>
            <th scope="col">
                <?php
                    Modal::begin([
                            'header' => Html::tag('h2', Html::tag('p', 'Create', ['class' => 'text-primary'])),
                            'toggleButton' => [
                                'label' => '➕',
                                'tag' => 'button',
                                'class' => 'btn btn-warning btn-block',
                            ],
                        ]); ?>
                        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/new'], 'method' => 'post']); ?>
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
                                'header' => Html::tag('h2', Html::tag('p', 'Edit', ['class' => 'text-primary'])),
                                'toggleButton' => [
                                    'label' => '🖋',
                                    'tag' => 'button',
                                    'class' => 'btn btn-outline-light',
                                ],
                            ]); ?>
                            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/edit'], 'method' => 'post']); ?>
                                <?= $form->field($model, 'sates')->textInput(['value' => 'edit', 'readonly'=> true])->label('Статус');?>
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
                                'toggleButton' => [
                                    'label' => '❌',
                                    'tag' => 'button',
                                    'class' => 'btn btn-outline-light',
                                ],
                            ]);?>
                            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/delete'], 'method' => 'post']); ?>
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