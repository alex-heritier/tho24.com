<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Biz newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Biz newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Biz query()
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereDescr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereMainImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereTrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biz whereUserId($value)
 * @mixin \Eloquent
 */
class Biz extends Model
{
    use HasFactory;

    protected $table = 'biz';

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
    ];
}
