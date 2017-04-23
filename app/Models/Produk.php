<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Produk extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'produk';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['id','id_kategori','nama_produk','harga','stock_totak','berat','minimal_beli','status',
    'tgl_awal_po','tgl_akhir_po','batas_waktu_bayar','batas_jam','foto','keterangan'];

    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function ukuran()
    {
         return $this->belongsToMany('App\Models\Ukuran')
                    ->withPivot('produk_id','ukuran_id','stock','harga_tambah')
                    ->withTimestamps();
     }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function metode()
    {
        return $this->belongsToMany('App\Models\Metode');
     }
    /*public function produk_ukuran()
    {
        return $this->hasMany('App\Models\ProdukUkuran','produk_id','ukuran_id','stock','harga_tambah','created_at','updated_at');
     } */ 
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
