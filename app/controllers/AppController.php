<?php

class AppController extends BaseController {

	protected $layout = 'layouts.master';

	public function showIndex()
	{
		$this->layout->content = View::make('index', $this->data);
	}

}
