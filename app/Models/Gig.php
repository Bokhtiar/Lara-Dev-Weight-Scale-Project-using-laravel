<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Gig extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='gigs';
    protected $primaryKey='gig_id';

    protected $fillable = [
        'title',
        'user_id',
        'body',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | min:3',
            'body' => 'required',
        ])->validate();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
