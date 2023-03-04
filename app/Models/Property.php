<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory,softDeletes;
    public $table = 'properties';
    public $timestamps = true;
    protected $guarded = ['id', 'imagePath'];


    public function landlords(){
        return $this->belongsTo('App\Models\Landlord', 'landlord_id');
        }

        protected $fillable = [
            'landlord_id',
            'area',
            'garage',
            'bathroom',
            'bedroom',
            'rent',
            'city',
            'state',
            'address',
            'description',
            'imagePath'
        ];
    
        public static $rules = [
            'landlord_id',
            'area' =>'required',
            'garage' =>'required|numeric',
            'bathroom' =>'required|numeric',
            'rent' =>'required|numeric',
            'city' =>'required',
            'state' =>'required',
            'address' =>'required',
            'description' =>'required',
            'imagePath' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
}

    