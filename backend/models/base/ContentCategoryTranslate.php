<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "content_category_translate".
 *
 * @property integer $id
 * @property string $language
 * @property string $title
 * @property integer $content_category_id
 * @property string $add_1
 * @property string $add_2
 *
 * @property \backend\models\ContentCategory $contentCategory
 * @property string $aliasModel
 */
abstract class ContentCategoryTranslate extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_category_translate';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language', 'title', 'content_category_id'], 'required'],
            [['content_category_id'], 'integer'],
            [['language'], 'string', 'max' => 45],
            [['title', 'add_1', 'add_2'], 'string', 'max' => 255],
            [['content_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentCategory::className(), 'targetAttribute' => ['content_category_id' => 'id']]
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
            'content_category_id' => Yii::t('app', 'Content Category ID'),
            'add_1' => Yii::t('app', 'Add 1'),
            'add_2' => Yii::t('app', 'Add 2'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentCategory()
    {
        return $this->hasOne(\backend\models\ContentCategory::className(), ['id' => 'content_category_id']);
    }




}