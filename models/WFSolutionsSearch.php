<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WFSolutions;

/**
 * WFSolutionsSearch represents the model behind the search form about `app\models\WFSolutions`.
 */
class WFSolutionsSearch extends WFSolutions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solutionid', 'authorid', 'ispublish'], 'integer'],
            [['solutionname', 'solutiondescription', 'solutioncontent', 'solutionflag', 'authorname', 'publishtime'], 'safe'],
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
        $query = WFSolutions::find();
		
        var_dump($query);die;
        
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
            'solutionid' => $this->solutionid,
            'authorid' => $this->authorid,
            'publishtime' => $this->publishtime,
            'ispublish' => $this->ispublish,
        ]);

        $query->andFilterWhere(['like', 'solutionname', $this->solutionname])
            ->andFilterWhere(['like', 'solutiondescription', $this->solutiondescription])
            ->andFilterWhere(['like', 'solutioncontent', $this->solutioncontent])
            ->andFilterWhere(['like', 'solutionflag', $this->solutionflag])
            ->andFilterWhere(['like', 'authorname', $this->authorname]);

        return $dataProvider;
    }
}
