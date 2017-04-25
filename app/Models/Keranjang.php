<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Keranjang extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_keranjang','produk_id','user_id','id_produk_ukuran',
    'jumlah'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    
     public function produk()
    {
        return $this->belongsTo('App\Models\Produk','produk_id');
     } 
     public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
     }  
     public function produk_ukuran()
    {
        return $this->belongsTo('App\Models\ProdukUkuran','id_produk_ukuran');
     } 
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
