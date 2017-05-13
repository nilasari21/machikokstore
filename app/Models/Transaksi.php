<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Transaksi extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_transaksi','id_user','tgl_transaksi','id_metode',
    'id_konfirmasi','id_penerima','status_bayar','jenis_pemesanan','status_jenis_pesan','total_berat','ongkir','total_bayar',
    'resi'];
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
    public function detail_transaki()
    {
        return $this->hasMany('App\Models\DetailTransaksi','id_transaksi');
     }  
     public function konfirmasi()
    {
        return $this->belongsTo('App\Models\Konfirmasi','id_konfirmasi');
     }  
     public function penerima()
    {
        return $this->belongsTo('App\Models\Penerima','id_penerima');
     } 
     public function metode_produk()
    {
        return $this->belongsTo('App\Models\MetodeProduk','id_metode');
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
