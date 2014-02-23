<?php

class ResponseController extends BaseController {


	public static function submit()
	{
		if($response_submission = Input::all()){

            $response = YoloResponse::validate($response_submission);

            if(isset($response->id))
            	return Response::json($response);
            else
            	return Response::json(false);
        }
	}

    public static function approve($id)
    {
        if($response = YoloResponse::find($id)){

            if(Payment::capturePaymentAuthorization($response->dare)){
                $response->accepted = 1;
                $response->save();

                return Redirect::to('/dashboard')->with('capture_dare_id', $response->dare->id);;
            }
        }
    }

}
