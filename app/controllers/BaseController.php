<?php

class BaseController extends Controller {

    protected $data = array();

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout))
        {
            # Metadata used on all views
            $this->data['locale'] = 'en';
            $this->data['environment'] = App::environment();

            $this->layout = View::make($this->layout, $this->data);
        }
    }

}
