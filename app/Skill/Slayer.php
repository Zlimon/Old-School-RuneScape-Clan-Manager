<?php

namespace App\Skill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Skill\Slayer
 *
 * @property int $id
 * @property int $account_id
 * @property int $rank
 * @property int $level
 * @property int $xp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slayer whereXp($value)
 * @mixin \Eloquent
 */
class Slayer extends Model
{
    protected $table = 'slayer';

    protected $fillable = ['level'];

    protected $hidden = ['user_id'];

    public function account()
    {
        return $this->belongsTo(\App\Account::class);
    }
}
