<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function masyarakat()
    {
        return $this->belongsTo(User::class);
    }
    public function inputanTambahan()
    {
        return $this->hasMany(InputanTambahan::class);
    }
    
}
