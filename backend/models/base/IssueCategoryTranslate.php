<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "issue_category_translate".
 *
 * @property integer $id
 * @property string $language
 * @property string $title
 * @property integer $issue_category_id
 *
 * @property \backend\models\IssueCategory $issueCategory
 * @property string $aliasModel
 */
abstract class IssueCategoryTranslate extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_category_translate';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language', 'title', 'issue_category_id'], 'required'],
            [['issue_category_id'], 'integer'],
            [['language'], 'string', 'max' => 45],
            [['title'], 'string', 'max' => 255],
            [['issue_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => IssueCategory::className(), 'targetAttribute' => ['issue_category_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'issue_category_id' => Yii::t('app', 'Issue Category ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssueCategory()
    {
        return $this->hasOne(\backend\models\IssueCategory::className(), ['id' => 'issue_category_id']);
    }




}
