<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.10.17
 * Time: 13:58
 */

namespace app\commands;

use yii\console\Controller;
use app\models\User;
use Yii;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //Delete old data from tables
        $auth->removeAll();

        //Create role

        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');

        //Writing roles into DB
        $auth->add($admin);
        $auth->add($user);

        //Creating permissions
        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'View of admin page';

        $editUser = $auth->createPermission('editUser');
        $editUser->description = 'Editing user';

        $addLeson = $auth->createPermission('addLeson');
        $addLeson->description = 'Lesson adding';

        $editLeson = $auth->createPermission('editLeson');
        $editLeson->description = ' Lesson edit';

        $deleteLeson = $auth->createPermission('deleteLeson');
        $deleteLeson->description = 'Lesson delete';

        //Writing permissions into DB
        $auth->add($viewAdminPage);
        $auth->add($editUser);
        $auth->add($addLeson);
        $auth->add($editLeson);
        $auth->add($deleteLeson);

        //Adding inheritance

        $auth->addChild($user, $editUser);

        // Admin inherits Edit User permission
        $auth->addChild($admin, $user);

        // Admin has his permissions
        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($admin, $addLeson);
        $auth->addChild($admin, $editLeson);
        $auth->addChild($admin, $deleteLeson);

        // Puting user with ID 1 as an sites administrator
        $auth->assign($admin, 1);


    }


}