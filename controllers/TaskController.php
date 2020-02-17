<?php

namespace app\controllers;

use Yii;
use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class TaskController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    // проверяем установлен ли язык пользователем
    if (isset($_GET['lang'])) $_SESSION['language'] = $_GET['lang'];
    if (!Yii::$app->language = $_SESSION['language']) Yii::$app->language = 'ru';

    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
      'access' => [
        'class' => AccessControl::class,
        'only' => ['update'],
        'rules' => [
          [
            'actions' => ['update'],
            'allow' => true,
            'roles' => ['admin']
          ]
        ]
      ]
    ];
  }
  public function actionIndex($month = null)
  {
    $dataProvider = new ActiveDataProvider([
      'query' => Tasks::getMonthProvider($month),
      'pagination' => [
        'pageSize' => 5
      ]
    ]);

    \Yii::$app->db->cache(function () use ($dataProvider) {
      return $dataProvider->prepare();
    });

    return $this->render('index', ['dataProvider' => $dataProvider]);
  }

  /**
   * Displays a single Tasks model.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  public function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post())) {
      $model->image = UploadedFile::getInstance($model, 'image');
      $model->upload();
      return $this->redirect(['update', 'id' => $model->id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }
  /**
   * Finds the Tasks model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Tasks the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Tasks::findOne($id)) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }

  /**
   * Deletes an existing Tasks model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }
}
