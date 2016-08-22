<?php

namespace app\modules\user\models;

use dektrium\user\models\RegistrationForm as RegistrationFormDektrium;

class RegistrationForm extends RegistrationFormDektrium
{

    /**
     * @var string
     */
    public $captcha;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required'];
        $rules[] = ['captcha', 'captcha', 'captchaAction' => '/site/captcha'];
        $rules[] = ['confirmPassword', 'compare', 'compareAttribute' => 'password'];
        $rules[] = ['confirmPassword', 'safe'];
        return $rules;
    }

    public function attributeLabels()
    {
        $rules = parent::rules();
        $rules['captcha'] = 'What do you see?:)';
        return $rules;
    }

}
