<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "department".
 *
 * @property integer $departmentid
 * @property string $departmentname
 * @property integer $schoolid
 * @property string $uploadtime
 * @property string $modifytime
 */
class Department extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentname', 'schoolid'], 'required'],
            [['schoolid'], 'integer'],
            [['uploadtime', 'modifytime'], 'safe'],
            [['departmentname'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departmentid' => Yii::t('app', 'ID'),
            'departmentname' => Yii::t('app', 'Name'),
            'schoolid' => Yii::t('app', 'School'),
            'uploadtime' => Yii::t('app', 'Upload Time'),
            'modifytime' => Yii::t('app', 'Modify Time'),
        ];
    }

    public function getSchool() {
        return $this->hasOne(School::className(), ['schoolid'=>'schoolid']);
    }

    public function getSchoolID($id) {
        return static::findOne(['departmentid'=>$id])->schoolid;
    }
}
