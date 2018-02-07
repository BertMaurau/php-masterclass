<?php

namespace app\models\customer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\customer\Customer;

/**
 * SearchCustomer represents the model behind the search form about `app\models\customer\Customer`.
 */
class SearchCustomer extends Customer
{

    public $country;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country'], 'integer'],
            [['name', 'firstname', 'address', 'zip', 'city', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this -> load($params);

        if (!$this -> validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query -> andFilterWhere([
            'id'      => $this -> id,
            'country' => $this -> country,
        ]);

        $query -> andFilterWhere(['like', 'name', $this -> name])
                -> andFilterWhere(['like', 'firstname', $this -> firstname])
                -> andFilterWhere(['like', 'address', $this -> address])
                -> andFilterWhere(['like', 'zip', $this -> zip])
                -> andFilterWhere(['like', 'city', $this -> city])
                -> andFilterWhere(['like', 'email', $this -> email]);

        return $dataProvider;
    }

}
