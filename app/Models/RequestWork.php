<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestWork extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='request_works';
    protected $primaryKey='request_work_id';

    protected $fillable = [
        'user_id',
        'driver_id',
        'seller_id',
        'body',
        'driver_status',
        'user_status',
        'seller_status',
        'status'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function driver(){
        return $this->belongsTo(User::class);
    }

    public function seller(){
        return $this->belongsTo(User::class);
    }
}
