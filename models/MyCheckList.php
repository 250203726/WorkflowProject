<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_mychecklist".
 *
 * @property integer $problemid
 * @property integer $problemgroupid
 * @property string $problemgroupname
 * @property string $problemdescribe
 * @property integer $problempriority
 * @property integer $problemkindid
 * @property string $problemkindname
 * @property string $reasons
 * @property string $solution
 * @property string $problemname
 */
class MyCheckList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_mychecklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problemgroupid', 'problempriority', 'problemkindid'], 'integer'],
            [['reasons', 'solution'], 'string'],
            [['problemgroupname'], 'string', 'max' => 50],
            [['problemdescribe', 'problemname'], 'string', 'max' => 200],
            [['problemkindname'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'problemid' => '编号',
            'problemgroupid' => '分类编号',
            'problemgroupname' => '分类名称',
            'problemdescribe' => '问题描述',
            'problempriority' => '优先级',
            'problemkindid' => '所属类别编号',
            'problemkindname' => '所属类别名称',
            'reasons' => '产生原因',
            'solution' => '解决方案',
            'problemname' => '问题名称',
        ];
    }
}
