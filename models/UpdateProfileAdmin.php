<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $photo_link
 * @property string $password
 * @property int $role
 * @property string $remember_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Article[] $articles
 */

class UpdateProfileAdmin extends Model
{

    public $login;
    public $email;
    public $password;
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->login = Yii::$app->request->post('UpdateProfileAdmin')['login'];
        $this->email = Yii::$app->request->post('UpdateProfileAdmin')['email'];
        $this->password = Yii::$app->request->post('UpdateProfileAdmin')['password'];

    }

    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\UpdateProfileAdmin', 'message' => 'This login has already been taken.'],
            ['login', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\UpdateProfileAdmin', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {

        if (!is_null(Yii::$app->user->identity->photo_link) && !is_null($this->image)) {
            deleteFile(Yii::$app->user->identity->photo_link);
        }

        $user = User::find()->where(['id' => Yii::$app->user->id])->one();

        $user->login = $this->login;
        $user->email = $this->email;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

        /**
         * Сохранение изображения.
         */
        if (!is_null($this->image)) {

            $randomPath = Yii::$app->security->generateRandomString();

            $this->image->saveAs("uploads/{$randomPath}.{$this->image->extension}");

            $user->photo_link = '/uploads/' . $randomPath . '.' . $this->image->extension;
        }

        $user->update();


    }

}


