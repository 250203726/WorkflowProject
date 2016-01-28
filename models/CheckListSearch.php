<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MyCheckList;

/**
 * CheckListSearch represents the model behind the search form about `app\models\MyCheckList`.
 */
class CheckListSearch extends MyCheckList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problemid', 'problemgroupid', 'problempriority', 'problemkindid'], 'integer'],
            [['problemgroupname', 'problemdescribe', 'problemname', 'problemkindname', 'reasons', 'solution'], 'safe'],
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
        $query = MyCheckList::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'problemid' => $this->problemid,
        	'problemname' => $this->problemgroupname,
            'problemgroupid' => $this->problemgroupid,
            'problempriority' => $this->problempriority,
            'problemkindid' => $this->problemkindid,
        ]);

        $query->andFilterWhere(['like', 'problemgroupname', $this->problemgroupname])
            ->andFilterWhere(['like', 'problemdescribe', $this->problemdescribe])
            ->andFilterWhere(['like', 'problemname', $this->problemname])
            ->andFilterWhere(['like', 'problemkindname', $this->problemkindname])
            ->andFilterWhere(['like', 'reasons', $this->reasons])
            ->andFilterWhere(['like', 'solution', $this->solution]);

        return $dataProvider;
    }
}
