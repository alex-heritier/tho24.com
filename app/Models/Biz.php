<?php

namespace App\Models;

use App\Services\TradeService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

/**
 * App\Models\Biz
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $descr
 * @property string $trade
 * @property string $url
 * @property string $main_img
 * @property string $email
 * @property string $phone_code
 * @property string $phone
 * @property string $district
 * @property string $ward
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Biz newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Biz newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Biz query()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Position> $positions
 * @property-read int|null $positions_count
 * @mixin \Eloquent
 */
class Biz extends Model
{
    use HasFactory;

    protected $table = 'biz';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'biz_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'biz_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'descr',
        'trade',
        'url',
        'main_img',
        'email',
        'phone_code',
        'phone',
        'district',
        'ward',
    ];


    // CUSTOM
    public function averageRating(): float
    {
        try {
            return $this->reviews()->pluck('rating')->avg() ?? 0;
        } catch (Exception $e) {
            return 0;
        }
    }

    public function prettyTrade(): string
    {
        return TradeService::TRADES[$this->trade];
    }
}
