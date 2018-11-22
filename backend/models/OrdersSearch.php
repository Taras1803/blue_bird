<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `common\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'session_id', 'user_id', 'status_id', 'created_at'], 'integer'],
            [['total_price'], 'number'],
            [['user_name', 'payment_method', 'delivery_method'], 'string'],
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
        if(isset($params['value']) && $params['type']){
            $query = Orders::find()
                ->leftJoin('sm_orders_products', '`sm_orders`.`id` = `sm_orders_products`.`order_id`')
                ->andWhere(['LIKE', 'sm_orders_products.' . $params['type'], $params['value']])
                ->orderBy(['sm_orders.created_at' => SORT_DESC]);
        } else {
            if(isset($params['sort'])){
                $query = Orders::find();
            } else {
                if(!$params)
                    $query = Orders::find()->orderBy(['created_at' => SORT_DESC]);
                else if(count($params) == 1 && isset($params['page']))
                    $query = Orders::find()->orderBy(['created_at' => SORT_DESC]);
                else
                    $query = Orders::find()->orderBy(['created_at' => SORT_DESC]);
            }
        }


        if($params['OrdersSearch']['date'])
            $this->created_at = strtotime($params['OrdersSearch']['date']);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'sm_orders.id' => $this->id,
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'total_price', $this->total_price])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'delivery_method', $this->delivery_method])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}
