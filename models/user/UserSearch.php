<?php


namespace app\models\user;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'firstname', 'email', 'password_hash', 'password_reset_token', 'auth_key', 'access_token'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->defaultOrder = ['username' => SORT_ASC];

        $this->load($params);

        if(!$this->validate()) {
            return $dataProvider;
        }

        /*
        // grid filtering conditions
        $query->filterWhere([
            'id' => $this->id,
            'username' => $this->username,
            'firstname' => $this->firstname,
            'email' => $this->email,
        ]);*/

        return $dataProvider;
    }
}