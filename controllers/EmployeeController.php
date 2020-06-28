<?php

namespace app\controllers;

use app\models\Employee;

class EmployeeController extends \yii\web\Controller
{

    public $enableCrscValidation=false;     
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateEmployee(){

        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;  //returns in json

        $employee=new  Employee();
        $employee->scenario=Employee::SCENERIO_CREATE;
        $employee->attributes=\Yii::$app->request->post();


        if($employee->validate()){

        $employee->save();  

        return array('status'=>true,'data'=>'employ created successfully');
        }else{
        return array('status'=>false,'data'=>$employee->getErrors());

        }
        // print_r('employee created!');exit;


    }

    public function actionListEmployee(){

        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;


        $employee=Employee::find()->all();

        if(count($employee)>0){

            return array('status'=>true,'data'=>$employee);

        }else{
            return array('status'=>false,'data'=>"Sorry!!!No employees found");

        }

    }


}
