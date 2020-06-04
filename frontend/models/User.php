<?php

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $phone
 * @property string|null $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $address
 * @property int|null $province_id
 * @property int|null $district_id
 * @property string|null $facebook
 * @property string|null $link_facebook
 * @property int|null $type_social 1: Facebook, 2: Google
 * @property string|null $id_social Id social
 * @property int|null $is_notification
 * @property int|null $sex
 * @property int|null $birthday
 * @property string|null $image_path
 * @property string|null $image_name
 * @property string|null $avatar_path
 * @property string|null $avatar_name
 * @property string $member_privatekey
 * @property string $member_username
 * @property int|null $last_request_time
 * @property int|null $user_before
 * @property int|null $getfly_id
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'password_hash', 'phone', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'province_id', 'district_id', 'type_social', 'is_notification', 'sex', 'birthday', 'last_request_time', 'user_before', 'getfly_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'phone', 'email', 'address', 'facebook', 'link_facebook', 'id_social', 'image_path', 'image_name', 'avatar_path', 'avatar_name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['member_privatekey', 'member_username'], 'string', 'max' => 250],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'phone' => 'Phone',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'address' => 'Address',
            'province_id' => 'Province ID',
            'district_id' => 'District ID',
            'facebook' => 'Facebook',
            'link_facebook' => 'Link Facebook',
            'type_social' => 'Type Social',
            'id_social' => 'Id Social',
            'is_notification' => 'Is Notification',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'image_path' => 'Image Path',
            'image_name' => 'Image Name',
            'avatar_path' => 'Avatar Path',
            'avatar_name' => 'Avatar Name',
            'member_privatekey' => 'Member Privatekey',
            'member_username' => 'Member Username',
            'last_request_time' => 'Last Request Time',
            'user_before' => 'User Before',
            'getfly_id' => 'Getfly ID',
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findByUserName($username)
    {
        return self::findOne(['username' => $username]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password_hash);
    }
    
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    
}
