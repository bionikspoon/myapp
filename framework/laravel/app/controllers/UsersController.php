<?php
/**
 * Created by PhpStorm.
 * User: Manu
 * Date: 1/8/2015
 * Time: 5:15 PM
 */

class UsersController extends BaseController {
    public function actionIndex()
    {
        return "this is a User Index Page";
    }

    public function actionAbout()
    {
        return "This is a User About Page";
    }


}