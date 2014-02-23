<?php

class CharityController extends BaseController {

    protected $layout = 'layouts.master';

	public function showIndex()
	{
		$this->data['dares'] = Dare::take(8)->orderBy('created_at')->get();
        $this->data['charities'] = Charity::all();
		$this->layout->content = View::make('charity.all', $this->data);
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


        $dares = $charity->dares;

        $this->data['total_raised'] =  0;

        foreach($dares as $dare){
        	$this->data['total_raised'] += $dare->getTotalRaised();
        }

        $this->data['charity'] = $charity;
        $this->layout->content = View::make('charity.single', $this->data);
    }
}