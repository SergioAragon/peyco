<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
      public $nombres;
    public $apellidos;
   // public $cedula;
    public $telefono;
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['nombres', 'trim'],
            ['nombres', 'required'],
            ['nombres', 'match','pattern'=>"/^[a-z]+$/i",'message'=> 'Solo se aceptan letras'],

            
            ['nombres', 'string', 'min' => 2, 'max' => 255],

            ['apellidos', 'trim'],
            ['apellidos', 'required'],
            ['apellidos', 'string', 'min' => 2, 'max' => 255],
            ['apellidos', 'match','pattern'=>"/^[a-z]+$/i",'message'=> 'Solo se aceptan letras'],

           /* ['cedula', 'trim'],
            ['cedula', 'required'],
            ['cedula', 'unique', 'targetClass' => '\common\models\User', 'message' => 'La cedula ha sido registrada en otro registro.'],
            ['cedula', 'integer'],*/

            ['telefono', 'trim'],
            ['telefono', 'required'],
            //['telefono', 'integer'],
            ['telefono', 'match','pattern'=>"/^[0-9]+$/i",'message'=> 'Solo se aceptan números'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'match','pattern'=>"/^[0-9a-z]+$/i",'message'=> 'Solo se aceptan números y letras'],


            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->nombres = $this->nombres;
        $user->apellidos = $this->apellidos;
       // $user->cedula = $this->cedula;
        $user->telefono = $this->telefono;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
             ->setTo($email)
             ->setFrom([\Yii::$app->params['adminEmail']])
            ->setSubject('hola')
            ->setTextBody('hola')
            ->send();
    }

        public function attributeLabels()
    {
        return [
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            //'cedula' => 'Cedula',
            'telefono' => 'Teléfono',
            'email'=>'Email',
            'username'=>'Usuario',
            'password'=>'Contraseña',
        ];
    }
}
