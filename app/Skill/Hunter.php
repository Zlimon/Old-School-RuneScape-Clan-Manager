<?php

namespace App\Skill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Skill\Hunter
 *
 * @property int $id
 * @property int $account_id
 * @property int $rank
 * @property int $level
 * @property int $xp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hunter whereXp($value)
 * @mixin \Eloquent
 */
class Hunter extends Model
{
    protected $table = 'hunter';

    protected $fillable = ['level'];

    protected $hidden = ['user_id'];

    public function account()
    {
        return $this->belongsTo(\App\Account::class);
    }
}
