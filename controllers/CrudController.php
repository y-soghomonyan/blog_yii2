<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\AddpostForm;
use app\models\EditpostForm;
use app\models\Posts;
use app\models\Category;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\data\Pagination;


class CrudController extends Controller{

    public function actionAddPost()
    {

        $model = new AddpostForm;
        $cats = $this->get_category();

         if($model->load(Yii::$app->request->post())){
            //if(Yii::$app->request->post()){
           
         
        //    echo "<pre>";
          
        //    print_r($model);die;
                     

        //    $model->name = Yii::$app->request->post('name');
        //    $model->description = Yii::$app->request->post('description');
        //    $model->category_id = Yii::$app->request->post('category_id');

           $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
           $model->imageFile->name = time().$model->imageFile->name;


           if ($model->upload()) {
            $model->imageFile = $model->imageFile->name;
            $model->created_at = date('Y-m-d H:i:s');
                if($model->save()){
                    Yii::$app->session->setFlash('success', 'data insert');
                    return Yii::$app->response->redirect(['crud/show']);
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error', 'data not insert');
                }
            }
        }

       return $this->render('addPost', ['model' => $model, 'cats' => $cats]);
    }

    
   

    public function actionEdit ($id){
       

        $post = Posts::findone(['id' => $id]); 
        $model = new EditpostForm;
      
        $cats = $this->get_category();
        // if(Yii::$app->request->post()){
        if($model->load(Yii::$app->request->post())){
           


            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            // echo "<pre>";
            // print_r($model->imageFile);die;
            $post->name = $model->name;
            $post->description = $model->description; //Yii::$app->request->post('description');
            $post->category_id = $model->category_id; //Yii::$app->request->post('category_id');
            if(!empty($model->imageFile)){
                $model->imageFile->name = time().$model->imageFile->name;

                if ($model->upload()) {

                    $post->imageFile = $model->imageFile->name;

                }
            }

            if($post->save()){
                Yii::$app->session->setFlash('success', 'data insert');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'data not insert');
                //return Yii::$app->response->redirect(['crud/show']);
            }
           
        }

        return $this->render('edit', ['post' => $post, 'model' => $model, "cats" => $cats]);
    }

    

    public function youtube (){
        $silka = 'https://www.youtube.com/watch?v=WHOVPeOuzjg&list=PL9XdPIVgBVVmYWGF3BFZwHu4Fz9fa6GJd&index=13';
    }

    public function actionShow (){

        // $posts = Posts::find()->all();

        // $posts = Posts::find()->orderBy(['id' => SORT_ASC])->all();

        // $posts = Posts::find()->asArray()->where(['id' => 1])->all();

        // $posts = Posts::find()->asArray()->where(['like', 'name', '2'])->all();

        // $posts = Posts::find()->asArray()->where(['<=', 'id', '2'])->all();

        // $posts = Posts::find()->asArray()->where(categoty=2)->limit(2)->all();
        
        // $posts = Posts::find()->asArray()->where(categoty=2)->limit(1)->one();
        
        //$count = Posts::find()->asArray()->count();

        //$post = Posts::findone(['id' => 1]); //  >asArray() stex chi ashxatum

        /* $query = "SELECT * FROM posts WHERE category `=` 1";
           $posts = Posts::findBySql($query)->all();
        */ 

        /* $query = "SELECT * FROM posts WHERE name LIKE :search"; :search greladzeva
           $posts = Posts::findBySql($query, [':search' => '%pp%'])->all(); // pp stex searchi valyuna
        */ 

       // $posts = Posts::findAll(['category' => 1]); // veradarcnum e bolory miayn parametrov

        //$posts = Posts::find()->asArray()->all();


        $postsss =  Posts::find()->with('categories')->all();

        $query = Posts::find()->with('categories');
        $pages = new Pagination([
            'totalCount' => $query->count(), 
            'pageSize' => 3,
            //nerqevi 2 haty urlum sirun tesqi hamar en
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all(); 

        $cats = Category::find()->with('posts')->all();
        return $this->render('show', [
                                        'postsss' => $postsss,
                                        "cats" => $cats, 
                                        'posts' =>$posts,
                                        'pages' => $pages 
         ]);

        //return $this->render('show', compact('posts'));

    }



    public function actionDelete ($id){
        $post = Posts::findone(['id' => $id]);
        
        if($post->delete()){
            Yii::$app->session->setFlash('success', 'data delete '.$post->name);
            return Yii::$app->response->redirect(['crud/show']);
            
        }else{
            Yii::$app->session->setFlash('error', 'data not delete'.$post->name);
            return Yii::$app->response->redirect(['crud/edit', 'id' => $id]);
        }
    }


    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function get_category(){
        $categoris = Category::find()->asArray()->all();
        
        $cats = [];
        foreach($categoris as $category){
           $cats[$category['id']] = $category['name'];
        }

        return $cats;
    }
}