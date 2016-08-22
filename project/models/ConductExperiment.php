<?php

namespace app\models;

use yii\base\Model;
use app\models\Experiment;
use app\models\Result;

class ConductExperiment extends Model
{
    public $throws = 36000;
    public $bonesNumber = 2;
    public $playerName = "";
    public $id_exp;
    public $experiment;
    public $results;
    public $throwResult;
    public $proportion = [];

    public function recordExperiment()
    {
        $experiment = new Experiment;
        $experiment->date = date('d-m-Y');
        $experiment->time = date('h:i:s');
        $experiment->name = $this->playerName;
        $experiment->bones_num = $this->bonesNumber;
        $experiment->throws = $this->throws;
        $experiment->save();
        $this->id_exp = $experiment->id_exp;
        $this->experiment = $experiment;
    }

    public function throwBones()
    {
        $results = [];
        for ($i = 2; $i <= 12; $i++) {
            $results[$i] = 0;
        }

        for ($i = 0; $i < 36000; $i++) {
            $num1 = mt_rand(1, 6);
            $num2 = mt_rand(1, 6);
            $sum = $num1 + $num2;
            $results[$sum]++;
        }
        $this->throwResult = $results;
    }

    public function recordResult()
    {
        foreach ($this->throwResult as $key => $value) {
            $results = new Result;
            $results->num = $key;
            $results->countn = $value;
            $results->id_exp = $this->id_exp;
            $results->save();
        }
    }

}
