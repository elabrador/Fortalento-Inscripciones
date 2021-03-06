<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudio_socio_economico".
 *
 * @property integer $id
 * @property integer $id_proceso
 * @property integer $id_estudiante
 * @property integer $n_planilla_inscripcion
 * @property string $codigo_ultimo_grado
 * @property boolean $vive_con_padres_solicitante
 * @property string $telefono_fijo_solicitante
 * @property string $telefono_celular_solicitante
 * @property string $apellidos_padre
 * @property string $nombres_padre
 * @property string $cedula_padre
 * @property integer $grado_instruccion_padre
 * @property string $telefono_fijo_padre
 * @property string $telefono_celular_padre
 * @property string $profesion_padre
 * @property string $ocupacion_padre
 * @property string $lugar_trabajo_padre
 * @property double $ingreso_mensual_padre
 * @property string $direccion_trabajo_padre
 * @property string $correo_e_padre
 * @property string $direccion_habitacion_padre
 * @property string $apellidos_madre
 * @property string $nombres_madre
 * @property string $cedula_madre
 * @property integer $grado_instruccion_madre
 * @property string $telefono_fijo_madre
 * @property string $telefono_celular_madre
 * @property string $profesion_madre
 * @property string $ocupacion_madre
 * @property string $lugar_trabajo_madre
 * @property double $ingreso_mensual_madre
 * @property string $direccion_trabajo_madre
 * @property string $correo_e_madre
 * @property string $direccion_habitacion_madre
 * @property string $apellidos_representante
 * @property string $nombres_representante
 * @property string $cedula_representante
 * @property integer $grado_instruccion_representante
 * @property string $telefono_fijo_representante
 * @property string $telefono_celular_representante
 * @property string $profesion_representante
 * @property string $ocupacion_representante
 * @property string $lugar_trabajo_representante
 * @property double $ingreso_mensual_representante
 * @property string $direccion_trabajo_representante
 * @property string $correo_e_representante
 *
 * @property Estudiantes $idEstudiante
 * @property Inscripciones $nPlanillaInscripcion
 * @property Procesos $idProceso
 */
class EstudioSocioEconomico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudio_socio_economico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proceso', 'id_estudiante', 'n_planilla_inscripcion', 'codigo_ultimo_grado', 'vive_con_padres_solicitante', 'apellidos_representante', 'nombres_representante', 'cedula_representante', 'grado_instruccion_representante', 'telefono_fijo_representante', 'telefono_celular_representante', 'profesion_representante', 'ocupacion_representante', 'lugar_trabajo_representante', 'ingreso_mensual_representante', 'direccion_trabajo_representante', 'correo_e_representante'], 'required'],
            [['id_proceso', 'id_estudiante', 'n_planilla_inscripcion', 'grado_instruccion_padre', 'grado_instruccion_madre', 'grado_instruccion_representante'], 'integer'],
            [['vive_con_padres_solicitante'], 'boolean'],
            [['ingreso_mensual_padre', 'ingreso_mensual_madre', 'ingreso_mensual_representante'], 'number'],
            [['codigo_ultimo_grado'], 'string', 'max' => 4],
            [['telefono_fijo_solicitante', 'telefono_celular_solicitante', 'telefono_fijo_padre', 'telefono_celular_padre', 'telefono_fijo_madre', 'telefono_celular_madre', 'telefono_fijo_representante', 'telefono_celular_representante'], 'string', 'max' => 11, 'min' => 11, 'tooShort' => '{attribute} deberia contener 11 números', 'tooLong' => '{attribute} deberia contener 11 números'],
            [['telefono_fijo_solicitante', 'telefono_celular_solicitante', 'telefono_fijo_padre', 'telefono_celular_padre', 'telefono_fijo_madre', 'telefono_celular_madre', 'telefono_fijo_representante', 'telefono_celular_representante'], 'match', 'pattern' => '/^[0][2,4][0-9]*$/'],
            [['apellidos_padre', 'nombres_padre', 'profesion_padre', 'ocupacion_padre', 'apellidos_madre', 'nombres_madre', 'profesion_madre', 'ocupacion_madre', 'apellidos_representante', 'nombres_representante', 'profesion_representante', 'ocupacion_representante'], 'string', 'max' => 128],
            [['cedula_padre', 'cedula_madre', 'cedula_representante'], 'string', 'max' => 8, 'tooLong' => '{attribute} deberia contener máximo 8 números'],
            [['cedula_padre', 'cedula_madre', 'cedula_representante'], 'match', 'pattern' => '/^[0-9]*$/'],
            [['lugar_trabajo_padre', 'direccion_trabajo_padre', 'correo_e_padre', 'direccion_habitacion_padre', 'lugar_trabajo_madre', 'direccion_trabajo_madre', 'correo_e_madre', 'direccion_habitacion_madre', 'lugar_trabajo_representante', 'direccion_trabajo_representante', 'correo_e_representante'], 'string', 'max' => 256],
            [['correo_e_padre','correo_e_madre','correo_e_representante'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Clave primaria, autoincremental.',
            'id_proceso' => 'Clave foránea que referencia a la tabla procesos',
            'id_estudiante' => 'Clave foránea que referencia a la tabla estudiantes',
            'n_planilla_inscripcion' => 'Clave foránea que referencia a la tabla inscripciones',
            'codigo_ultimo_grado' => 'Código del último grado culminado por el estudiante. Clave foránea que referencia a la tabla grados del sistema Fortalento',
            'vive_con_padres_solicitante' => '¿Vive con los padres?',
            'telefono_fijo_solicitante' => 'Teléfono fijo',
            'telefono_celular_solicitante' => 'Teléfono celular',
            'apellidos_padre' => 'Apellidos del padre',
            'nombres_padre' => 'Nombres del padre',
            'cedula_padre' => 'Cédula de identidad del padre',
            'grado_instruccion_padre' => 'Grado de instrucción del padre',
            'telefono_fijo_padre' => 'Teléfono fijo del padre',
            'telefono_celular_padre' => 'Teléfono celular del Padre',
            'profesion_padre' => 'Profesión del padre',
            'ocupacion_padre' => 'Ocupación del padre',
            'lugar_trabajo_padre' => 'Lugar de trabajo del padre',
            'ingreso_mensual_padre' => 'Ingreso mensual del padre',
            'direccion_trabajo_padre' => 'Dirección de trabajo del padre',
            'correo_e_padre' => 'Correo electrónico del padre',
            'direccion_habitacion_padre' => 'Direccion de habitación del padre',
            'apellidos_madre' => 'Apellidos de la madre',
            'nombres_madre' => 'Nombres de la madre',
            'cedula_madre' => 'Cédula de identidad de la madre',
            'grado_instruccion_madre' => 'Grado de instrucción de la madre',
            'telefono_fijo_madre' => 'Teléfono fijo de la madre',
            'telefono_celular_madre' => 'Teléfono celular de la madre',
            'profesion_madre' => 'Profesión de la madre',
            'ocupacion_madre' => 'Ocupación de la madre',
            'lugar_trabajo_madre' => 'Lugar de trabajo de la madre',
            'ingreso_mensual_madre' => 'Ingreso mensual de la madre',
            'direccion_trabajo_madre' => 'Dirección de trabajo de la madre',
            'correo_e_madre' => 'Correo electrónido de la madre',
            'direccion_habitacion_madre' => 'Dirección de habitacion de la madre',
            'apellidos_representante' => 'Apellidos del representante',
            'nombres_representante' => 'Nombres del representante',
            'cedula_representante' => 'Cédula de identidad del representante',
            'grado_instruccion_representante' => 'Grado instrucción del representante',
            'telefono_fijo_representante' => 'Teléfono fijo del representante',
            'telefono_celular_representante' => 'Teléfono celular del representante',
            'profesion_representante' => 'Profesión del representante',
            'ocupacion_representante' => 'Ocupación del representante',
            'lugar_trabajo_representante' => 'Lugar de trabajo del representante',
            'ingreso_mensual_representante' => 'Ingreso mensual del representante',
            'direccion_trabajo_representante' => 'Direccion de trabajo del representante',
            'correo_e_representante' => 'Correo electrónico del representante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstudiante()
    {
        return $this->hasOne(Estudiantes::className(), ['id' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNPlanillaInscripcion()
    {
        return $this->hasOne(Inscripciones::className(), ['id' => 'n_planilla_inscripcion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProceso()
    {
        return $this->hasOne(Procesos::className(), ['id' => 'id_proceso']);
    }

    /**
     * @inheritdoc
     * @return EstudioSocioEconomicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstudioSocioEconomicoQuery(get_called_class());
    }
    
    public function afterFind()
	{
		if (!$this->vive_con_padres_solicitante)
			$this->vive_con_padres_solicitante = 0;
		// Formatea la fecha según se ha configurado en config/web.php
		// 'formatter' => [
        //	   'dateFormat' => 'dd-MM-yyyy',
        // ]
            
		//$this->fecha_nacimiento = Yii::$app->formatter->asDate($this->fecha_nacimiento);
		
		parent::afterFind();
	}
}
