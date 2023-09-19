<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $snd_id
 * @property int $rcv_id
 * @property string $chat_token
 * @property string $msg_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $receiver
 * @property-read \App\Models\User $sender
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereChatToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMsgText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereRcvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSndId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Message extends Model
{
    use HasFactory;

    public function sender()
    {
        return $this->belongsTo(User::class, 'snd_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'rcv_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'snd_id',
        'rcv_id',
        'msg_text',
        'chat_token',
    ];

    public static function buildUserToUserToken(int $id1, int $id2): string
    {
        $min_id = min($id1, $id2);
        $max_id = max($id1, $id2);

        return $min_id.'::'.$max_id;
    }
}
