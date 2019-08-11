<?php
/**
 * User: TheCodeholic
 * Date: 8/11/2019
 * Time: 12:52 PM
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * Class SignupForm
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 8, 'max' => 32],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);

        if ($user->save()){
            return true;
        }

        \Yii::error("User was not saved: ".VarDumper::dumpAsString($user->errors));
        return false;
    }

}
