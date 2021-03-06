<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Certifications');

?>

<div class="panel panel-primary ">
  <div class="panel-heading">
  <?= Html::encode($this->title) ?>
  </div>
  <div class="panel-body">
  
  
   <?php if (Yii::$app->session->hasFlash('savecertification')): ?>
   <div class="alert alert-success">
        <h1><span class="glyphicon glyphicon-ok"></span> Certification Has Been Saved</h1>
    </div>
<?php endif; ?>

<div class="certification-index">



   <?php

Modal::begin([
  'closeButton' =>['label' => 'X', 'class' => 'btn btn-default col-md-offset-11','data-dismiss'=>'modal'],
    'toggleButton' => ['label' => 'Add Certification','class' => 'btn btn-danger btn-lg'],
]);
?>

<?php
echo $this->render('_form', [
    'model' => $model,
]);
?>



<?php
Modal::end();

 ?>

 <p></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [



            'certification',
            'institution',
            'publication_date',

            ['class' => 'yii\grid\ActionColumn',
        'header' => '<center>Update</center>',
        'template'=>'{update}',
          'buttons' => [
              'update' => function($url, $model) {
                return Html::a('<center><span class="glyphicon glyphicon-edit"></span></center>',$url, [
                    'title' => Yii::t('yii','update'),

                ]);


              }


          ],

      ],


          ['class' => 'yii\grid\ActionColumn',
        'header' => '<center>Delete</center>',
        'template'=>'{delete}',
          'buttons' => [
              'delete' => function($url, $model) {
                return Html::a('<center><span class="glyphicon glyphicon-remove"></span></center>',$url, [
                    'title' => Yii::t('yii','delete'),
                    'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
                    'data-method' => 'post',

                ]);


              }


          ],

      ],
        ],
    ]); ?>

</div>
</div>
</div>
