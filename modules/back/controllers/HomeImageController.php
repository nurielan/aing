<?php

namespace app\modules\back\controllers;

use Yii;
use app\modules\back\models\HomeImage;
use app\modules\back\models\HomeImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * HomeImageController implements the CRUD actions for HomeImage model.
 */
class HomeImageController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all HomeImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HomeImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HomeImage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HomeImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HomeImage();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'image');

            if ($model->imageFile) {
                $model->image = strtotime(date('Y-m-d h:i:s')).'.'.$model->imageFile->extension;
                Image::make($model->imageFile->tempName)->fit(480, 480)->save('images/base/home-image/thumbnail/'.$model->image, 40);
            }

            $model->created_at = date('Y-m-d h:i:s');
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HomeImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'image');

            if ($model->imageFile) {
                $model->image = strtotime(date('Y-m-d h:i:s')).'.'.$model->imageFile->extension;

                Image::make($model->imageFile->tempName)->fit(480, 480)->save('images/base/home-image/thumbnail/'.$model->image, 40);

                if ($image) {
                    unlink('images/base/home-image/thumbnail/'.$image);
                }
            } else {
                $model->image = $image;
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HomeImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->image) {
            unlink('images/base/home-image/thumbnail/'.$model->image);
        }

        $model->delete();

        Yii::$app->db->transaction(function($db) {
            $db->createCommand('ALTER TABLE home_image DROP id')->execute();
            $db->createCommand('ALTER TABLE home_image ADD id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT FIRST')->execute();
        });

        return $this->redirect(['index']);
    }

    /**
     * Finds the HomeImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HomeImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HomeImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
