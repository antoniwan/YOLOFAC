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

            if(is_int($response) && $response)
                return Redirect::to('/dare/show/' . $response);
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

    public function test_media()
    {
        $url = 'https://vine.co/v/MzHp6YFmv5Z';

        Media::getEmbeddedData($url);

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
