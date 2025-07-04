<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'user_id',
        'subjek',
        'pesan',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the feedback.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subject label for display.
     */
    public function getSubjekLabelAttribute()
    {
        $labels = [
            'masalah_teknis' => 'Masalah Teknis',
            'keluhan_layanan' => 'Keluhan Layanan',
            'saran_pengembangan' => 'Saran Pengembangan',
            'pertanyaan_informasi' => 'Pertanyaan Informasi'
        ];

        return $labels[$this->subjek] ?? $this->subjek;
    }

    /**
     * Get the status label for display.
     */
    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Menunggu',
            'processed' => 'Diproses',
            'resolved' => 'Selesai'
        ];

        return $labels[$this->status] ?? $this->status;
    }
}