<?php

class EpisodeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create', 'update', 'delete'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    // Check if id was submitted via GET
	    if(!isset($id))
	        $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing', 'text/html');
	 
	    $model = Episode::model()->findByPk($id);
	    // Did we find the requested model? If not, raise an error
	    if(is_null($model)){
	        $this->_sendResponse(404, 'No Item found with id '.$id, 'text/html');
	    } else {
	        $this->_sendResponse(200, CJSON::encode($model));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Episode;
		
	    // Try to assign POST values to attributes
	    foreach($_POST as $var=>$value) {
	        // Does the model have this attribute? If not raise an error
	        if($model->hasAttribute($var))
	            $model->$var = $value;
	        else
	            $this->_sendResponse(500, 
	                sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var,
	                $_GET['model']), 'text/html' );
	    }
	    // Try to save the model
	    if($model->save())
	        $this->_sendResponse(200, CJSON::encode($model));
	    else {
	        // Errors occurred
	        $msg = "<h1>Error</h1>";
	        $msg .= sprintf("Couldn't create model <b>%s</b>", "Episode");
	        $msg .= "<ul>";
	        foreach($model->errors as $attribute=>$attr_errors) {
	            $msg .= "<li>Attribute: $attribute</li>";
	            $msg .= "<ul>";
	            foreach($attr_errors as $attr_error)
	                $msg .= "<li>$attr_error</li>";
	            $msg .= "</ul>";
	        }
	        $msg .= "</ul>";
	        $this->_sendResponse(500, $msg ,'text/html');
	    }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$json = file_get_contents('php://input');
		$put_vars = CJSON::decode($json,true);
		$model=$this->loadModel($id);
		
		if($model === null){
        $this->_sendResponse(400, 
                sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",
                'Episode', $id) );
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		   // Try to assign PUT parameters to attributes
	    foreach($put_vars as $var=>$value) {
	        // Does model have this attribute? If not, raise an error
	        if($model->hasAttribute($var))
	            $model->$var = $value;
	        else {
	            $this->_sendResponse(500, 
	                sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>',
	                $var, $_GET['model']) );
	        }
	    }
		
	    // Try to save the model
	    if($model->save()){
	        $this->_sendResponse(200, CJSON::encode($model));
	    }else{
	        $this->_sendResponse(500, $msg );
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		if($model === null){
        $this->_sendResponse(400, 
                sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",
                $_GET['model'], $_GET['id']) );
		}

		 // Delete the model
	    $num = $model->delete();
	    if($num>0){
	        $this->_sendResponse(200, $num);    //this is the only way to work with backbone
	    } else{
	        $this->_sendResponse(500, 
	                sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",
	                $_GET['model'], $_GET['id']) );
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($param = null, $val = null)
	{
		if($param === null){
			$dataProvider=new CActiveDataProvider('Episode');
	        $models = $dataProvider->getData();
	        $rows = array();
	        foreach($models as $model)
	            $rows[] = $model->attributes;
	        $this->_sendResponse(200, CJSON::encode($rows));
		} else {
			$criteria = new CDbCriteria;
 
        	$criteria->compare('id', $this->id);
			$models=Episode::model()->findAll($param .' like :param', array(':param'=>"%" . $val . "%"));
			$rows = array();
	        foreach($models as $model)
	            $rows[] = $model->attributes;
	        $this->_sendResponse(200, CJSON::encode($rows));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Episode('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Episode']))
			$model->attributes=$_GET['Episode'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Episode the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Episode::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Episode $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='episode-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function _sendResponse($status = 200, $body = '', $content_type = 'application/json') {
		// set the status
		header('Content-type: ' . $content_type);

		echo $body;
		Yii::app() -> end();
	}

	private function _getStatusCodeMessage($status) {
		// these could be stored in a .ini file and loaded
		// via parse_ini_file()... however, this will suffice
		// for an example
		$codes = Array(200 => 'OK', 400 => 'Bad Request', 401 => 'Unauthorized', 402 => 'Payment Required', 403 => 'Forbidden', 404 => 'Not Found', 500 => 'Internal Server Error', 501 => 'Not Implemented', );
		return (isset($codes[$status])) ? $codes[$status] : '';
	}
}
