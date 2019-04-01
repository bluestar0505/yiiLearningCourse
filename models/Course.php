<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "course".
 *
 * @property integer $courseid
 * @property string $coursename
 * @property integer $schoolid
 * @property integer $departmentid
 * @property string $uploadtime
 * @property string $modifytime
 */
class Course extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coursename', 'schoolid', 'departmentid', 'uploadtime', 'modifytime'], 'required'],
            [['schoolid', 'departmentid'], 'integer'],
            [['uploadtime', 'modifytime'], 'safe'],
            [['coursename'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'courseid' => Yii::t('app', 'ID'),
            'coursename' => Yii::t('app', 'Course Name'),
            'schoolid' => Yii::t('app', 'School ID'),
            'departmentid' => Yii::t('app', 'Department'),
            'uploadtime' => Yii::t('app', 'Upload Time'),
            'modifytime' => Yii::t('app', 'Modifyt Time'),
        ];
    }

    public function getSchool() {
        return $this->hasOne(School::className(), ['schoolid'=>'schoolid']);
    }

    public function getDepartment() {
        return $this->hasOne(Department::className(), ['departmentid'=>'departmentid']);
    }
}
