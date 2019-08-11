<?php
/**
 * User: TheCodeholic
 * Date: 8/11/2019
 * Time: 2:01 PM
 */
/** @var $model \app\models\Article */
?>

<div>
    <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]) ?>">
        <h3><?php echo \yii\helpers\Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($model->body), 40) ?>
    </div>
    <hr>
</div>
