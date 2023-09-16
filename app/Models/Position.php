<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Position
 *
 * @property int $id
 * @property int $biz_id
 * @property string $title
 * @property string $description
 * @property string $address
 * @property int|null $min_salary
 * @property int $max_salary
 * @property string $salary_rate
 * @property int $hire_count
 * @property string $employment_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @property-read \App\Models\Biz $biz
 * @mixin \Eloquent
 */
class Position extends Model
{
    use HasFactory;

    public static $salaryRateValues = [
        'hourly' => 'Hourly',
        'daily' => 'Daily',
        'weekly' => 'Weekly',
        'monthly' => 'Monthly',
        'yearly' => 'Yearly',
    ];

    public static $employmentTypeValues = [
        'fulltime' => 'Full-time',
        'parttime' => 'Part-time',
        'internship' => 'Internship',
    ];

    protected $table = 'positions';
    protected $fillable = [
        'biz_id',
        'title',
        'description',
        'address',
        'min_salary',
        'max_salary',
        'salary_rate',
        'hire_count',
        'employment_type',
        'status',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('hide-deletes', function (Builder $builder) {
            $builder->whereNot('status', 'X');
        });
    }

    public function biz()
    {
        return $this->belongsTo(Biz::class, 'biz_id');
    }

    public function applies()
    {
        return $this->hasMany(Apply::class, 'position_id');
    }

    public function myApplies()
    {
        if (Auth::user() === null) {
            throw new Exception('Position relationship myApplies needs an auth user');
        }
        return $this->applies()->where('user_id', Auth::user()->id);
    }
}
