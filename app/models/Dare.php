<?php

class Dare extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dares';

     //Validation rules for Dares
    protected static $rules = array(
        'title' => 'required',
        'description' => 'required',
        'excerpt' => 'required|max:140',
        'donation_amount' => 'required|numeric',
        'donation_quantity' => 'required|numeric',
        'media-url' => 'url',
        'media-picture' => 'url'
    );

    public static function validate($dare_submission)
    {
        $validator = Validator::make($dare_submission, self::$rules);

        if($validator->fails()){
            return $validator;
        }else {
            $dare = new Dare;
            $dare->title = $dare_submission['title'];
            $dare->excerpt = $dare_submission['excerpt'];
            $dare->description = $dare_submission['description'];
            $dare->donation_amount = $dare_submission['donation_amount'];
            $dare->donation_quantity = $dare_submission['donation_quantity'];

            Auth::user()->dares()->save($dare);

            if(isset($dare_submission['media-url']) && $dare_submission['media-url']){
                $media = new Media;
                $media->media_meta = Media::getEmbeddedData($dare_submission['media-url']);

                $dare->medias()->save($media);
            }


            if(isset($dare_submission['media-picture']) && $dare_submission['media-picture']){
                $media = new Media;
                $media->media_url = $dare_submission['media-picture'];

                $dare->medias()->save($media);
            }

            return $dare;
        }
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function medias()
    {
        return $this->hasMany('Media');
    }

    public function payments()
    {
        return $this->hasMany('Payment');
    }

}