<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_date',
        'tuition_month',
        'tuition_year',
        'student_id',
        'officer_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tuition_month' => 'string',
        'tuition_year' => 'string',
    ];

    /**
     * Get the student that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    /**
     * Get the officer that oversees the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function officer(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'officer_id', 'id');
    }
}
