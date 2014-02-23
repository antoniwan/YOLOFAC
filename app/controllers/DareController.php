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


    public function showDare($dareId = null)
    {
        if(!$dareId)
            return Rediret::to('/');

        $dare = Dare::find($dareId);
        if(!$dare)
            return Redirect::to('/');

        $this->data['dare'] = $dare;
        $this->data['user'] = User::find($dare->user_id);
        $this->data['service'] = Service::find($dare->user_id);
        $this->layout->content = View::make('dare.single', $this->data);
    }

    public function listAll()
    {
        $dares = Dare::all()->toArray();
        foreach($dares as $dare)
        {
            $agg_dares[$dare['id']]['id'] = $dare['id'];
            $agg_dares[$dare['id']]['date_submitted'] = $dare['created_at'];
            $agg_dares[$dare['id']]['dare_data'] = $dare;
            $agg_dares[$dare['id']]['user_data'] = User::find($dare['user_id'])->toArray(); //extremely inefficient, FPO
            $agg_dares[$dare['id']]['donations_data'] = '';
            $agg_dares[$dare['id']]['challengers_data'] = '';
        }
        return Response::json($agg_dares);
    }
}
