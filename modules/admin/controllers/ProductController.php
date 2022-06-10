<?php

namespace app\modules\admin\controllers;

use app\models\SaleImage;
use app\modules\admin\models\Product;
use app\modules\admin\controllers\ProductSearch;
use app\modules\admin\models\ProductImage;
use app\rbac\AuthorRule;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['index','create','view','update','rule'],
                            'allow' => true,
                            'roles' => ['canAdmin'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->user_id = Yii::$app->user->id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->save();
            Yii::$app->session->setFlash('success',"Продукт {$model->name} был обновлен");
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::find()->with('tags')->andWhere(['id'=>$id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionSaveImg()
    {
        $this->enableCsrfValidation = false;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $dir = 'upload/' . $post['ProductImage']['class'] . '/';
            $file = UploadedFile::getInstanceByName('ProductImage[attachment]');
            $model = new ProductImage();
            $model->name = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(7) . '.' . $file->extension;
            $model->load($post);
            $model->validate();
            if ($file->saveAs($dir . $model->name)) {
                $model->save();
            } else {
                echo 'Ошибка валидации';
            }
//            Yii::$app->response->format = Response::FORMAT_JSON;
            return $file;
        }
    }
    public function  actionDelImg(){
        if($model = ProductImage::findOne(Yii::$app->request->post('key')) and $model->delete() ){
            return true;
        }else{
            throw new  NotFoundHttpException('что-то не удаляеться, возможно кто-то уже удалил этот файл :(');
        }

    }
    public function actionSaveSale(){
        $this->enableCsrfValidation = false;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $dir = 'upload/sale/';
            $file = UploadedFile::getInstanceByName('SaleImage[attachment]');
            $model = new SaleImage();
            $model->name = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(7) . '.' . $file->extension;
            $model->load($post);
            $model->validate();
            if ($file->saveAs($dir . $model->name)) {
                $model->save();
                Yii::info($model->getErrors());
            } else {
                echo 'Ошибка валидации';
            }
            return $file;
        }
    }
    public function actionRule(){
//        $admin= Yii::$app->authManager->createRole('user');
//        $admin->description = 'Обычный прользыватель';
//        Yii::$app->authManager->add($admin);
//        $permit = Yii::$app->authManager->createPermission('canAdmin');
//        $permit->description = 'Право на  вход  в админку';
//        Yii::$app->authManager->add($permit);
//        $role = Yii::$app->authManager->getRole('editor');
//        $permit = Yii::$app->authManager->getPermission('canAdmin');
//        Yii::$app->authManager->addChild($role, $permit);

//        $userRole = Yii::$app->authManager->getRole('user');
//        Yii::$app->authManager->assign($userRole, 2);

//        $auth = Yii::$app->authManager;
//        $rule = new AuthorRule();
//        $auth->add($rule);


        return "Я добавил все";
    }
}
