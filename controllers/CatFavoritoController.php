<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Usuario;
use yii\web\Controller;
use app\models\Producto;
use yii\data\Pagination;
use app\models\CatFavorito;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\CatFavoritoSearch;
use yii\web\NotFoundHttpException;


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
        return $this->render('registrarFav',compact('fav','usu'));
    }
    
    public function actionBoton()
    {
        return $this->render('btnfav');
    }

    public function actionBtnfav()
    {
        $fav = new CatFavorito(); //instanciamos el modelo
        if($this->request->isAjax){//Si la petición es por AJAX
            $id = $this->request->post('id'); //Obtenemos el id por post
            if(isset($id)){//Si existe el id
                $fav = $this->findModel($id); //encontramos el modelo con el id
            }
            $fav->fav_estado = $this->request->post('es');//obtenemos el estado por post y lo guardamos en una variable
            $fav->save(); //guardamos los cambios en el modelo
        }
        $response = Yii::$app->response; //Obtenemos los datos de la respuesta 
        $response->format = Response::FORMAT_JSON; //Le damos formato a la respuesta
        $response->data = ['save' => $id];//
        $response->data = ['html' => $this->renderPartial('registrarFav')];//Renderizamos parcial
        return $response;
    }

    public function actionBtnfavpro()
    {
        // llega el id del js 
        $pro = $this->request->post('id');
        //se hace una consulta para que traiga el id del que se registra
        $fav = CatFavorito::find()->where(['fav_fkproducto' => $pro, 'fav_fkusuario' => Usuario::usuario()->usu_id])->one();
        $productos = Producto::findOne(['pro_id' => $pro]);
        // si no ha asigando ese favorito lo guarda
        if (!isset($fav)) {
            $model = new CatFavorito();
            $model->fav_fkproducto = $pro;
            $model->fav_fkusuario   = Usuario::usuario()->usu_id;
            $model->fav_estado = 1;
            $model->save();
            // si no le cambia los valores
        }else{
            if ($fav->fav_estado == 1) {
                $fav->fav_estado = 0;
            } else {
                $fav->fav_estado = 1;
            }
            $fav->save();
        }
        $response = Yii::$app->response; //Obtenemos los datos de la respuesta 
        $response->format = Response::FORMAT_JSON; //Le damos formato a la respuesta
        // se manda la viriable a la vista del boton
        $response->data = ['html' => $this->renderPartial('btnfavpro', compact('productos'))]; //Renderizamos parcial
        return $response;
    }
}
