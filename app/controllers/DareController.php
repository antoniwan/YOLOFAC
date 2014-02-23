<?php

class DareController extends BaseController {

    protected $layout = 'layouts.master';

    public function showDareCreate()
    {
        $this->layout->content = View::make('dare.create', $this->data);
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
