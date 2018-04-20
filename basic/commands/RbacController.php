<?php
/**
 * Created by PhpStorm.
 * User: fitchu
 * Date: 02.03.18
 * Time: 20:51
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit(){
        $auth = Yii::$app->authManager;

        $createTicket=$auth->createPermission('createTicket');
        $createTicket->description='Create a Ticket';
        $auth->add($createTicket);



        $getViewOperatorPage=$auth->createPermission('getViewOperatorPage');
        $getViewOperatorPage->description='get view operator page';
        $auth->add($getViewOperatorPage);



        $updateTable=$auth->createPermission('updateWindow');
        $updateTable->description='Update a Window';
        $auth->add($updateTable);

        $deleteTable=$auth->createPermission('deleteWindow');
        $deleteTable->description='Delete a Window';
        $auth->add($deleteTable);

        $terminal = $auth->createRole('terminal');
        $auth->add($terminal);
        $auth->addChild($terminal,$createTicket);

        $operator = $auth->createRole('operator');
        $auth->add($operator);
        $auth->addChild($operator,$getViewOperatorPage);

        $admin= $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin,$operator);
        $auth->addChild($admin,$updateTable);
        $auth->addChild($admin,$deleteTable);
        $auth->addChild($admin,$terminal);

        $auth->assign($terminal,2);
        $auth->assign($operator,3);
        $auth->assign($admin,1);


    }
}