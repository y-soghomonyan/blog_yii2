<!-- <style style="display: block; white-space:pre" contenteditable="">
*{
    transition: .3s all;
}

</style> -->

<style>

.block_img{
    width:120px;
    height:80px;
}
.block_img img{
    width:100%;
    height:100%;
    object-fit: contain;
}
</style>

<h2 class="header-test">Show page</h2>
<br>


<div class="container">
    <div class="row">
        
    <?foreach($posts as $post):
        if(!is_array($post)):?>
        <div class="col-4">
            <div class="post_blocks">
                    <div class="block_img">
                        <?= \yii\helpers\Html::img("@web/uploads/{$post->imageFile}") ;?>
                   </div>
                   <a href="<?= \yii\helpers\Url::to(['crud/edit', 'id' => $post->id]) ;?>"><h2><?=$post->name;?></h2></a>
                   <p><?=$post->description;?></p>
                   <div>
                    <a href="<?= \yii\helpers\Url::to(['crud/edit', 'id' => $post->id]) ;?>">Edit</a>
                    <a class="text-danger" href="/index.php?r=crud%2Fdelete&id=<?=$post->id;?>">Delete</a>
                   </div>
            </div>
        </div>
        
       <?endif;
    endforeach; ?>


    </div>
    <div class="row">
        <?=
        yii\widgets\LinkPager::widget([
            'pagination' => $pages,
            
            'options' => [
                'class' => 'pagination justify-content-center mt-5'
            ],
            'linkOptions' => ['class' => 'page-link'],
            'pageCssClass' => ['class' => 'page-item'],
            'prevPageCssClass' => 'page-item',
            'nextPageCssClass' => 'page-item',
            'firstPageCssClass' => 'page-first',
		    'lastPageCssClass' => 'page-last',
            'disabledPageCssClass' => 'page-item disable',
        ])
        
        ?>
      
    </div>
</div>




<div class="container mt-5">
    <div class="row">

<?
foreach($cats as $cat){
    echo "<ul class='list-group'>";
        echo "<li class='list-group-item'>";
            echo $cat->name;
            foreach($cat->posts as $post){
                echo "<ul>";
                    echo "<li class='list-group-item'>";
                        echo $post->name."/".$post->id;
                    echo "</li>";
                echo "</ul>";
            }
        echo "</li>";
    echo "</ul>";
}

?>
<br>
<br>

<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <!-- <th>Category id</th> -->
        <th>Category Name</th>
        <th>Image</th>
        <th>Link</th>
        <th>Delete</th>
        <th>Date</th>
    </tr>
    <?
    foreach($postsss as $post):
        if(!is_array($post)):?>
        <!-- es depqy er kanchvum e uxaki all() ov -->
            <tr>
                <td><?=$post->name;?></td>
                <td><?=$post->description;?></td>
                <!-- <td><? //=$post->category_id;?></td> -->
                <td><?=$post->categories->name ?? "";?></td>
                <!-- <td  style="width:250px; height:120px;">
                    <img class="img-rounded" 
                        style=" width:100%; height:100%; object-fit: contain;"
                         src="<? //='/uploads/'.$post->imageFile;?>" alt="">
                </td> -->
                <td>
                   <div class="block_img">
                        <?= \yii\helpers\Html::img("@web/uploads/{$post->imageFile}") ;?>
                   </div>
                        
                </td>

                <!-- <td><a href="/index.php?r=crud%2Fedit&id=
                <? //=$post->id; ?>
                ">Link/<? //=$post->id; ?>
            </a></td> -->
                <td><a href="<?= \yii\helpers\Url::to(['crud/edit', 'id' => $post->id]) ;?>">Link/<?=$post->id;?></a></td>
                <td><a class="text-danger" href="/index.php?r=crud%2Fdelete&id=<?=$post->id;?>">Delete</a></td>
                <td><?= Yii::$app->formatter->asDate($post->created_at) ?></td>
                <!-- config/web - formatter -->
            </tr>
        <?else:?>
            <!-- es depqy er kanchvum e asArray() ov -->
            <tr>
                <td><? //= $post['name']; ?></td>
                <td><? //=$post['description']; ?></td>
                <td><? //=$post['category']; ?></td>
                <td><? //=$post->categories ?></td>
            </tr>
        
       <?endif;
    endforeach; ?>

</table>

</div>
</div>