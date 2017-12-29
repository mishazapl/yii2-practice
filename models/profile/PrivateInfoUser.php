<?php

namespace app\models\profile;

use app\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\HttpException;

/**
 * This is the model class for table "private_info_user".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property int $message
 * @property string $rank
 * @property string $created_at
 *
 * @property User $user
 */
class PrivateInfoUser extends \yii\db\ActiveRecord
{
    /**
     * Поведения для сохранения временной метки.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => null,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'private_info_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'message'], 'integer'],
            [['created_at'], 'safe'],
            [['first_name', 'last_name', 'rank'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 1],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'message' => 'Message',
            'rank' => 'Rank',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Получения профиля пользователя и запись в сессию.
     *
     * @param $id
     * @return object
     * @throws HttpException
     */
    public function setInfo($id): void
    {
        $id = (int) $id;
        $session = Yii::$app->session;

        /**
         * 1. Проверка на существование
         * 2. Если нету таких данных в сессии, получаем профиль пользователя
         * и записываем в сессию.
         *
         *  @var $id.
         *  @var $user.
         */
        if (!$session->has($id)) {
            $user = $this::find()->where(['user_id' => $id])->one();
            if (!is_null($user)) {
                $session->set($id, $user);
            } else {
                throw new  HttpException(409, 'Произошла ошибка, свяжитесь с администратором, mzapalenov@mail.ru');
            }
        }
    }
}
