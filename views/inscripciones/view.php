<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inscripciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_proceso',
            'id_estudiante',
            'fecha_inscripcion',
            'codigo_plantel',
            'localidad_plantel',
            'codigo_ultimo_grado',
            'postulado_para',
            'promedio',
            'nota1',
            'nota2',
            'nota3',
            'codigo_profesion_jefe_familia',
            'codigo_nivel_instruccion_madre',
            'codigo_fuente_ingreso_familia',
            'codigo_vivienda_familia',
            'codigo_ingreso_familia',
            'codigo_grupo_familiar',
        ],
    ]) ?>

</div>
