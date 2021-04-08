<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    /**
     * Disable timestamps logging
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'label', 'last_log',
    ];

    public function lastLog() {
        return $this->belongsTo(Log::class, 'last_log');
    }
}
