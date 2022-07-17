<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'name' => 'string | required | max:15 | min:3',
        ])->validate();

    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function permission()
    {
       return $this->hasOne(Permission::class);
    }
}
