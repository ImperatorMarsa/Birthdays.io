<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Birthday;
use app\models\BirthdayForm;
use app\models\Name;
use app\models\Relationship;

class SiteController extends Controller{
    public function actionIndex($message = 'up', $button = 'id'){
        $order = SORT_ASC;
        if ($message == 'down') {
            $order = SORT_DESC;
        }        

        $model = new BirthdayForm();
            
        $birthdays = (new \yii\db\Query())
            ->select(['relationship.id', 'name.name', 'birthday'])
            ->from(['relationship'])
            ->leftJoin('name', 'name.id=relationship.n_id')
            ->leftJoin('birthday', 'birthday.id=relationship.b_id')
            ->orderBy([$button => $order])
            ->all();
                        
        return $this->render('index', [
            'birthdays' => $birthdays,
            'model' => $model,
            'alert' => $alert,
        ]);
    }

    public function actionDelete(){
        $model = new BirthdayForm();
        if ($model->load(Yii::$app->request->post())) {
            $relation = Relationship::findOne($model->id);
            $birthday = Birthday::findOne($relation->b_id);
            $name = Name::findOne($relation->n_id);

            if ($model->sates == 'delete'){
                Yii::$app->session->setFlash('success', "Поле №$relation->id успешно удалено");
                Relationship::findOne($relation->id)->delete();
                Birthday::findOne($birthday->id)->delete();
                Name::findOne($name->id)->delete();
            }
        }
        return $this->render('editor-confirm');
    }
    public function actionEdit(){
        $model = new BirthdayForm();
        if ($model->load(Yii::$app->request->post())) {
            $relation = Relationship::findOne($model->id);
            $birthday = Birthday::findOne($relation->b_id);
            $name = Name::findOne($relation->n_id);

           if ($model->sates == 'edit'){
                Yii::$app->session->setFlash('success', "Поле №$relation->id успешно изменнено");
                $name->name = $model->name;
                $birthday->birthday = $model->date;

                $name->save();
                $birthday->save();
            }
        }
        return $this->render('editor-confirm');
    }
    public function actionNew(){
        $model = new BirthdayForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sates == 'new'){
                $newRelation = new Relationship();
                $newBirthday = new Birthday();
                $newName = Name::findOne($model->name);
                if (is_null($newName)){
                    $newName = new Name();
                    $newName->name = $model->name;
                    $newName->kind = "Who careS";
                }
                
                $newBirthday->birthday = $model->date;
                $newBirthday->save();
                $newName->save();
                
                $newRelation->b_id = $newBirthday->id;
                $newRelation->n_id = $newName->id;
                $newRelation->save();

                Yii::$app->session->setFlash('success', "Было успешно создано новое поле №$newRelation->id");
            }
        }
        return $this->render('editor-confirm');
    }
}