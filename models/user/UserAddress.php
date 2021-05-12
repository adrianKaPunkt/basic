<?php


namespace app\models\user;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

class UserAddress extends ActiveRecord
{
    /**
     * This is the model class for table "{{%user_address}}
     *
     * @property int $user_id
     * @property string $address
     * @property string $zipcode
     * @property string $city
     */

    public static function tableName(): string
    {
        return '{{%user_address}}';
    }

    public function rules(): array
    {
        return [
            [['user_id', 'address', 'zipcode', 'city'], 'required'],
            ['user_id', 'integer'],
            [['address', 'city'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'address' => 'Straße und Hausnummer',
            'zipcode' => 'PLZ',
            'city' => 'Stadt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
}