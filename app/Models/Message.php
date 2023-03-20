<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $min_id . '::' . $max_id;
    }
}
