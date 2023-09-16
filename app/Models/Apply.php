<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Apply
 *
 * @property int $id
 * @property int $user_id
 * @property int $position_id
 * @property string $note
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Apply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apply query()
 * @mixin \Eloquent
 */
class Apply extends Model
{
    use HasFactory;

    public static $statusValues = [
        'P' => 'Pending',
        'A' => 'Accepted',
        'R' => 'Rejected',
    ];

    protected $fillable = [
        'user_id',
        'position_id',
        'status',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
