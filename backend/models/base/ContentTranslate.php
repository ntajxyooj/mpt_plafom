<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "content_translate".
 *
 * @property integer $id
 * @property string $language
 * @property string $title
 * @property string $summary
 * @property string $details
 * @property string $keywords
 * @property string $meta_keywords
 * @property integer $content_id
 * @property string $add_1
 * @property string $add_2
 * @property string $add_3
 * @property string $add_4
 * @property string $add_5
 *
 * @property \backend\models\Content $content
 * @property string $aliasModel
 */
abstract class ContentTranslate extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_translate';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language', 'title', 'content_id'], 'required'],
            [['summary', 'details', 'add_1', 'add_2', 'add_3', 'add_4', 'add_5'], 'string'],
            [['content_id'], 'integer'],
            [['language'], 'string', 'max' => 45],
            [['title', 'keywords', 'meta_keywords'], 'string', 'max' => 255],
            [['content_id'], 'exist', 'skipOnError' => true, 'targetClass' => Content::className(), 'targetAttribute' => ['content_id' => 'id']]
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
            'summary' => Yii::t('app', 'Summary'),
            'details' => Yii::t('app', 'Details'),
            'keywords' => Yii::t('app', 'Keywords'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'content_id' => Yii::t('app', 'Content ID'),
            'add_1' => Yii::t('app', 'Add 1'),
            'add_2' => Yii::t('app', 'Add 2'),
            'add_3' => Yii::t('app', 'Add 3'),
            'add_4' => Yii::t('app', 'Add 4'),
            'add_5' => Yii::t('app', 'Add 5'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(\backend\models\Content::className(), ['id' => 'content_id']);
    }




}