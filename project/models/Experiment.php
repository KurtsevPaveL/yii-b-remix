<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experiment".
 *
 * @property integer $id_exp
 * @property string $date
 * @property string $time
 * @property string $name
 * @property integer $bones_num
 * @property integer $throws
 */
class Experiment extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experiment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'time', 'name', 'bones_num', 'throws'], 'required'],
            [['bones_num', 'throws'], 'integer'],
            [['date', 'time', 'name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_exp' => 'Id Exp',
            'date' => 'Date',
            'time' => 'Time',
            'name' => 'Name',
            'bones_num' => 'Bones Num',
            'throws' => 'Throws',
        ];
    }

}
