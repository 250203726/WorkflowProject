<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_solutions".
 *
 * @property integer $solutionid
 * @property string $solutionname
 * @property string $solutiondescription
 * @property string $solutioncontent
 * @property string $solutionflag
 * @property integer $authorid
 * @property string $authorname
 * @property string $publishtime
 * @property integer $ispublish
 */
class WFSolutions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_solutions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solutioncontent'], 'string'],
            [['authorid', 'ispublish'], 'integer'],
            [['publishtime'], 'safe'],
            [['solutionname'], 'string', 'max' => 500],
            [['solutiondescription'], 'string', 'max' => 1000],
            [['solutionflag'], 'string', 'max' => 50],
            [['authorname'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'solutionid' => 'Solutionid',
            'solutionname' => '标题',
            'solutiondescription' => '描述',
            'solutioncontent' => '内容',
            'solutionflag' => '标签',
            'authorid' => '作者ID',
            'authorname' => '作者名称',
            'publishtime' => '发布时间',
            'ispublish' => '是否发布',
        ];
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
    	 
    	//var_dump($params);die;
    	 
    	 
    	$this->load($params);
    	 
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $query;
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
    	 
    	return $query;
    }
}
