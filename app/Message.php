<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message']; //MENGIZINKAN MENYIMPAN DATA KE COLUMN MESSAGE

    //RELASI KE TABLE USER UNTUK MENGAMBIL SIAPA PEMILIK PESAN TERSEBUT
    public function user()
    {
        //KITA GUNAKAN BELONGSTO KARENA USER BERTINDAK SEBAGAI DATA INDUK
        return $this->belongsTo(User::class);
    }
}

