<? 

/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\AddpostForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
echo "<h1>Add post</h1>";?>

<?  $form = ActiveForm::begin(
    [
        'options' => ['enctype' => 'multipart/form-data']
    //     'id' => 'login-form',
    //   //  'layout' => 'horizontal',
    //     'fieldConfig' => [
    //         'template' => "{label}\n{input}\n{error}",
    //         'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
    //         'inputOptions' => ['class' => 'col-lg-3 form-control'],
    //         'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
    //     ],
    ]
    );

     ?>
     <!-- <div class="form-group">
        <label for="">Name:</label>
        <input type="text" class="form-control" name="name" value="<? //=$post->name?>">
    </div>
    <div class="form-group">
        <label for="">Description:</label>
        <input type="text" class="form-control" name="description" value="<? //=$post->description?>">
    </div>
    <div class="form-group">
        <label for="">category:</label>
        <input type="text" class="form-control" name="category_id" value="<? //=$post->category_id?>">
    </div>
    <div class="form-group">
        <label for="">category:</label>
        <input type="file" class="form-control" name="imageFile" value="<? //=$post->category_id?>">
    </div> -->

        <?= $form->field($model, 'name');//->textInput(['autofocus' => true]) ?>
        
        <?=  $form->field($model, 'category_id')->dropDownList($cats);?>
        <?= $form->field($model, 'description')->textarea(); //->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <div class="form-group">
            <div class="">
                <input type="submit">
                <?  Html::submitButton('Add post', ['class' => 'btn btn-primary', 'name' => 'Send']) ?>
            </div>
        </div>

    <?php  ActiveForm::end(); ?>