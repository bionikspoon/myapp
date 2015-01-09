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
    public function getIndex()
    {
    	$myForm = "";
    	$myForm .= Form::open();
    	$myForm .= Form::label('username', 'Username');
    	$myForm .= Form::text('username', Form::old('username'));
    	$myForm .= Form::submit('Dont do it!');
    	$myForm .= Form::close();
		return $myForm;
    }
    public function postIndex()
    {
    	return dd(Input::all());
    }
    public function getAbout()
    {
    	return "TODO: About user page";
    }

}