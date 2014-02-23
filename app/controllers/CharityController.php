<?php

class CharityController extends BaseController {

    protected $layout = 'layouts.master';

	public function showIndex()
	{
		return 'need to make this view';
	}

	public function listAll()
	{
		return Response::json(Charity::all());
	}

	public function showCharity($charityId = null)
    {
        if(!$charityId)
            return Rediret::to('/');

        if(!$charity = Charity::find($charityId))
            return Redirect::to('/');

        $this->data['charity'] = $charity;
        $this->layout->content = View::make('charity.single', $this->data);
    }
}