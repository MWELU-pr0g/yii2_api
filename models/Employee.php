<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $contact
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     const SCENERIO_CREATE="create";
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'contact'], 'required', 'on'=>'create'],
            [['contact'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'contact' => 'Contact',
        ];
    }

    public function scenarios()
    {
        $scenario=parent::scenarios();
        $scenarios["create"]=['name','email','contact'];
        return $scenario;
    }
}
