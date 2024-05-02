<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Favorities extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    protected $primaryKey = 'favorite_id';

    public $incrementing = true;

    public static function paginate(int $int)
    {
    }

    /**
     * Relationship many to many
     * @return HasMany
     */
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
