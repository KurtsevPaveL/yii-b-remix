<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property integer $id_result
 * @property integer $num
 * @property integer $countn
 * @property integer $id_exp
 */
class Result extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num', 'countn', 'id_exp'], 'required'],
            [['num', 'countn', 'id_exp'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_result' => 'Id Result',
            'num' => 'Num',
            'countn' => 'Countn',
            'id_exp' => 'Id Exp',
        ];
    }

}
