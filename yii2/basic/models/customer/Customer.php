<?php

namespace app\models\customer;

use Yii;
use \app\models\Country;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $firstname
 * @property string $address
 * @property string $zip
 * @property string $city
 * @property integer $country
 * @property string $email
 *
 * @property Country $country0
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country'], 'integer'],
            [['name', 'firstname', 'city'], 'string', 'max' => 32],
            [['address', 'email'], 'string', 'max' => 120],
            [['zip'], 'string', 'max' => 8],
            [['country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'name'      => 'Name',
            'firstname' => 'Firstname',
            'address'   => 'Address',
            'zip'       => 'Zip',
            'city'      => 'City',
            'country'   => 'Country',
            'email'     => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this -> hasOne(Country::className(), ['id' => 'country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this -> hasMany(Order::className(), ['customer_id' => 'id']);
    }

}
