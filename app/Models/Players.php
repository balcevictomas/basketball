<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Players
 *
 * @property int $id;
 * @property string $name;
 * @property string $surname;
 */
class Players extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function getFullNameAttribute(): string
    {
        return sprintf('%s %s', $this->name, $this->surname);
    }

    public function getSlugAttribute(): string
    {
        return sprintf('%s-%s', strtolower($this->name), strtolower($this->surname));
    }
}
