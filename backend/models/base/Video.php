<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base-model class for table "video".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $date
 * @property integer $sort
 * @property string $status
 * @property string $created_date
 * @property string $updated_date
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\User $createdBy
 * @property \backend\models\User $updatedBy
 * @property \backend\models\VideoTranslate[] $videoTranslates
 * @property string $aliasModel
 */
abstract class Video extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const STATUS_1 = '1';
    const STATUS_0 = '0';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'date'], 'required'],
            [['date', 'created_date', 'updated_date'], 'safe'],
            [['sort'], 'integer'],
            [['status'], 'string'],
            [['title', 'link'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            ['status', 'in', 'range' => [
                    self::STATUS_1,
                    self::STATUS_0,
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'link' => Yii::t('app', 'Link'),
            'date' => Yii::t('app', 'Date'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
            'updated_date' => Yii::t('app', 'Updated Date'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoTranslates()
    {
        return $this->hasMany(\backend\models\VideoTranslate::className(), ['video_id' => 'id']);
    }




    /**
     * get column status enum value label
     * @param string $value
     * @return string
     */
    public static function getStatusValueLabel($value){
        $labels = self::optsStatus();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column status ENUM value labels
     * @return array
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_1 => Yii::t('app', self::STATUS_1),
            self::STATUS_0 => Yii::t('app', self::STATUS_0),
        ];
    }

}