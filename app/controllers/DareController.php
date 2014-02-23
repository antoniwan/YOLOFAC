<?php

class DareController extends BaseController {

    protected $layout = 'layouts.master';

    public function showDareCreate()
    {
        $this->layout->content = View::make('dare.create', $this->data);
    }

    public function submitDare()
    {

    	if($dare_submission = Input::all()){

    		$response = Dare::validate($dare_submission);

    		if(is_bool($response) && $response)
    			return Redirect::to('/');
    		else
    			return Redirect::to('/dare/create')->withErrors($response);
    	}

    	return Redirect::to('/dare/create');
    }

    public function media()
    {
    	$this->layout = null;
        error_reporting(E_ALL | E_STRICT);
        $upload_handler = new UploadHandler(array(
            'accept_file_types' => '/\.(gif|jpe?g|png)$/i'
        ));
    }

    public function showDare()
    {
        $this->layout->content = View::make('dare.single', $this->data);
    }

    public function listAll()
    {
        return Response::json(Dare::all());
    }
}
