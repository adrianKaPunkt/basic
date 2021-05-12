<?php
namespace app\models\user;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\caching\DummyCache;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property integer $role_id
 * @property string $restaurant_id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ROLE_DIRECTION = 0;
    const ROLE_BAR = 1;
    const ROLE_WAITER = 2;
    const ROLE_RUNNER = 3;
    const ROLE_SOMELIER = 4;

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 2;

    const RESTAURANT_MOOK_GROUP = 0;
    const RESTAURANT_MSTEAK = 1;
    const RESTAURANT_IVORY = 2;
    const RESTAURANT_ZENZA = 3;
    const RESTAURANT_MONAMIE = 4;
    const RESTAURANT_FRANZISKA = 5;

    public static $restaurants = ['Mook Group', 'M-Steakhouse', 'Ivory Club', 'Zenzakan', 'Mon Amie Maxi', 'Franziska'];
    public static $roles = ['Leitung', 'Bar', 'Service', 'Foodrunner', 'Sommelier'];
    public static $statuses = ['gelöscht', 'inaktiv', 'aktiv'];

    public string $password;
    public string $passwordConfirm;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nick',
            'firstname' => 'Vorname',
            'lastname' => 'Nachname',
            'email' => 'E-Mail',
            'role_id' => 'Rolle',
            'restaurant_id' => 'Restaurant',
            'status' => 'Status',
            'created_at' => 'hinzugefügt am:',
            'updated_at' => 'geändert am:',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            ['restaurant_id', 'in', 'range' => [self::RESTAURANT_MOOK_GROUP, self::RESTAURANT_MSTEAK, self::RESTAURANT_IVORY, self::RESTAURANT_ZENZA, self::RESTAURANT_MONAMIE, self::RESTAURANT_FRANZISKA]],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\user\User', 'message' => 'This email address has already been taken.'],

            ['username', 'string', 'max' => 15],
            [['firstname', 'lastname'], 'string', 'max' => '50'],

            //['password', 'required'],
            //['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne([
           'email' => $email
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation, $attributeNames);

        if(!$ok) {
            $transaction->rollBack();
            return false;
        }
        try {
            $transaction->commit();
        } catch (Exception $e) {
            return Yii::$app->session->getFlash($e->getMessage());
        }
        return $ok;
    }

    /**
     * @param $id
     * @return UserAddress
     */
    public function getAddress($id) : ?UserAddress
    {
        return UserAddress::findOne($id);
    }
}