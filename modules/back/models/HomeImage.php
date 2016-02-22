<?php

namespace app\modules\back\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "home_image".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class HomeImage extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'required', 'on' => ['create']],
            [['image'], 'image']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
