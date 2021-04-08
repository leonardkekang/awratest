<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'table', 'action', 'old_value', 'new_value', 'created_by', 'updated_by',
    ];

    public function createdBy() {
        $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy() {
        $this->belongsTo(User::class, 'updated_by');
    }
}
