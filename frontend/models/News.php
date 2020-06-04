<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $category_id danh mục tin tức
 * @property string $short_description mô tả ngắn
 * @property string $description chi tiết bài tin
 * @property int $status trạng thái
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_title
 * @property string $avatar_path
 * @property string $avatar_name
 * @property string $author người đăng tin
 * @property int $updated_at
 * @property int $publicdate ngày đăng tin tức
 * @property int $viewed lượt xem
 * @property string $source nguồn tin
 * @property int $ishot tin hot
 * @property int $created_at
 * @property int|null $user_id
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'category_id', 'short_description', 'description', 'meta_keywords', 'meta_description', 'meta_title', 'avatar_path', 'avatar_name', 'author', 'source'], 'required'],
            [['category_id', 'status', 'updated_at', 'publicdate', 'viewed', 'ishot', 'created_at', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['title', 'alias', 'meta_keywords', 'meta_description', 'meta_title', 'avatar_path', 'avatar_name', 'author', 'source'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'category_id' => 'Category ID',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'status' => 'Status',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'meta_title' => 'Meta Title',
            'avatar_path' => 'Avatar Path',
            'avatar_name' => 'Avatar Name',
            'author' => 'Author',
            'updated_at' => 'Updated At',
            'publicdate' => 'Publicdate',
            'viewed' => 'Viewed',
            'source' => 'Source',
            'ishot' => 'Ishot',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
        ];
    }
}
