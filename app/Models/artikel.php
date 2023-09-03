<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_author',
        'judul',
        'cuplikan',
        'gambar_artikel',
        'isi_artikel',
        'status_artikel',
        'tgl_artikel',
    ];

    public function getCreatedAtAtribute()
    {
        return Carbon::parse($this->attributes['tgl_artikel'])->translatedFormat('l, d F Y');
    }

    /**
     * Get the user associated with the artikel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
