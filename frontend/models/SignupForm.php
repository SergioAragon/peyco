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
        $id = Yii::$app->user->identity->id;
        $authKey = Yii::$app->user->identity->authKey;

        $subject = "Confirmar registro";
        $body = "<h2>Click en el enlace para finalizar registro</h2>";
        $body .= "<a href = http://localhost/sergio/peyco/frontend/web/index.php?r=site/login/confirm&id=" . $id . "&authKey=" . $authKey . ">Confirmar</a>";

        return Yii::$app->mailer->compose()
             ->setTo($email)
             ->setFrom([\Yii::$app->params['adminEmail']])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }
           

     
    public function confirm()
    {
            
            $id = Yii::$app->user->identity->id;
            $authKey = Yii::$app->user->identity->authKey;
        
            if ($id)           
            {
                return
                //Realizamos la consulta para obtener el registro
               
                $model = User::find()->where("id=:id", [":id" => $id])
                ->andWhere("authKey=:authKey", [":authKey" => $authKey]);
     
                //Si el registro existe
                if ($model->count() == 1)
                {
                    $activar = User::findOne($id);
                    $activar->activate = 1;
                    if ($activar->update())
                    {
                        echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                        return update();
                    }
                    else
                    {
                        echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
                        echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                    }
                 }
                else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["site/login"]);
                }
            }
            else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["site/login"]);
            }
        
     }

}
