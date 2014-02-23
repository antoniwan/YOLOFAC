<?php

class YoloResponse extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'responses';

    //  //Validation rules for Dares
    protected static $rules = array(
        'comments' => 'required',
        'video_url' => 'required',
        'dare_id' => 'required'
    );

    public static function validate($response_submission)
    {

    	$validator = Validator::make($response_submission, self::$rules);

        if($validator->fails()){
            return $validator;
        }else {

        	$dare = Dare::find($response_submission['dare_id']);

        	if($dare){
        		$response = new YoloResponse;
        		$response->comments = $response_submission['comments'];
        		$response->video_url = $response_submission['video_url'];

        		$dare->responses()->save($response);
        	}


            return $response;
        }
    }

    public function dare()
	{
		return $this->belongsTo('Dare');
	}

}