<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Producto;
use app\models\CatFavorito;
use app\models\CatFavoritoSearch;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;


/**
 * CatFavoritoController implements the CRUD actions for CatFavorito model.
 */
class CatFavoritoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all CatFavorito models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatFavoritoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatFavorito model.
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

    /**
     * Creates a new CatFavorito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatFavorito();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->fav_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        // $producto= ArrayHelper::map(Producto::find()->all(),'pro_id','pro_nombre'); 
        // echo('<pre>');
        // var_dump($producto);
        // echo('</pre>');
        // die;
        return $this->render('create', [
            'model' => $model,
           /*  'producto' => $producto, */
        ]);
    }
     

    /**
     * Updates an existing CatFavorito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->fav_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatFavorito model.
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

    /**
     * Finds the CatFavorito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatFavorito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatFavorito::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //mostrar productos favoritos
    public function actionFavorito(){

        // $model=Producto::find();
           
        // // $paginacion= new Pagination([
        // //     'defaultPageSize'=>1,
        // //     'totalCount'=>$model->count(),
        // // ]);
        // $favorito=$model->all();
        
        // //funcion que se trae del modelo
        // $fav=CatFavorito::favorito();
        // //funcion que se trae del modelo
        // $usu=CatFavorito::usuario();
        

//se manda  ala vista 
       return $this->render('registrarFav',compact('fav','usu'));
   }
}
