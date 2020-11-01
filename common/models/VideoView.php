<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_view}}".
 *
 * @property string $video_id
 * @property int $user_id
 * @property int $created_at
 *
 * @property Videos $video
 * @property User $user
 */
class VideoView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_view}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Videos::className(), 'targetAttribute' => ['video_id' => 'video_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VideosQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Videos::className(), ['video_id' => 'video_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoViewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoViewQuery(get_called_class());
    }
}
