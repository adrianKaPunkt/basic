<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">
    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->id === $model->created_by) : ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <small>
            Created at: <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
            By: <?php echo $model->createdBy->email ?>
        </small>
    </p>
    <div>
        <?php echo $model->getEncodedBody(); ?>
    </div>
</div>