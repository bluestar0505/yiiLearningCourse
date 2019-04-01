<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $schoolid
 * @property string $schoolname
 * @property integer $stepid
 * @property string $uploadtime
 * @property string $modifytime
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['schoolname'/*, 'stepid'*/, 'uploadtime', 'modifytime'], 'required'],
//            [['stepid'], 'integer'],
            [['uploadtime', 'modifytime'], 'safe'],
            [['schoolname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'schoolid' => Yii::t('app', 'Schoolid'),
            'schoolname' => Yii::t('app', 'Schoolname'),
//            'stepid' => Yii::t('app', 'Stepid'),
            'uploadtime' => Yii::t('app', 'Uploadtime'),
            'modifytime' => Yii::t('app', 'Modifytime'),
        ];
    }

    public function getArrAllSchool() {
        $all_records = School::find()->all();

        $arr_school = array();
        foreach ($all_records as $record){
            $school = array();
            $school['schoolid'] = $record->schoolid;
            $school['schoolname'] = $record->schoolname;
            $arr_school [] = $school;
        }
        return $arr_school;
    }
}
