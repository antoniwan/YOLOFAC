<?php

class CharityController extends BaseController {

	public function showIndex()
	{
		return 'need to make this view';
	}

	public function listAll()
	{
		return Response::json(Charity::all());
	}
}