<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Blog extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='blogs';
    protected $primaryKey='blog_id';

    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | min:3',
            'body' => 'required',
        ])->validate();
    }

    public function scopeImage($value, $request){
        $image = array();
       if ($request->hasFile('image')) {
           foreach ($request->image as $key => $photo) {
               $path = $photo->store('blog/photos/');
               array_push($image, $path);
           }
       }
       return $image;
   }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
