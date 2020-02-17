<?php


namespace app\commands;


use app\models\tables\Users;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        $am = \Yii::$app->authManager;

        $permissionTaskCreate = $am->createPermission('TaskCreate');
        $permissionTaskUpdate = $am->createPermission('TaskUpdate');
        $permissionTaskDelete = $am->createPermission('TaskDelete');

        $am->add($permissionTaskCreate);
        $am->add($permissionTaskUpdate);
        $am->add($permissionTaskDelete);


        $admin = $am->createRole("admin");
        $user = $am->createRole("user");

        $am->add($admin);
        $am->add($user);

        $am->addChild($admin, $permissionTaskCreate);
        $am->addChild($admin, $permissionTaskUpdate);
        $am->addChild($admin, $permissionTaskDelete);

        $am->addChild($user, $permissionTaskCreate);
        $am->addChild($user, $permissionTaskUpdate);


        $am->assign($admin, 1);
        $am->assign($user, 2);

    }
}