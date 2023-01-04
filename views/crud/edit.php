<? 

/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\EditpostForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;?>

<h1>Edit <?=$post->name?></h1>




<?  

// echo "<pre>";
// print_r($cats);


$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

<!-- <div class="form-group">
    <label for="email">Name:</label>
    <input type="text" class="form-control" name="name" value="<?=$post->name?>">
  </div>
  <div class="form-group">
    <label for="email">Description:</label>
    <input type="text" class="form-control" name="description" value="<?=$post->description?>">
  </div>
  <div class="form-group">
    <label for="email">category:</label>
    <input type="text" class="form-control" name="category_id" value="<?=$post->category_id?>">
  </div> -->
<!-- 
<input type="submit"> -->

        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'value' => $post->name]) ?>
        <!-- activeDropDownList( -->
        <?=  $form->field($model, 'category_id')->dropDownList($cats, ['options' => [$post->category_id => ['Selected'=>'selected']]]);?>
        <?= $form->field($model, 'description')->textarea()->textInput(['autofocus' => true, 'value' => $post->description]) ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <div class="form-group">
            <div class="">
                <input type="submit">
                <?  Html::submitButton('Add post', ['class' => 'btn btn-primary', 'name' => 'Send']) ?>
            </div>
        </div>

    <?php  ActiveForm::end(); ?>