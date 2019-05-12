<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'patrs', 'time', 'name','number','approved',

        ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function getStatutAttribute(){
        if($this->user_responded == null)
            return 'In Hold';
        elseif($this->accepted)
            return 'Accepted';
        return 'Declined';
    }

}
