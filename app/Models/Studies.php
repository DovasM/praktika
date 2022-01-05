<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\StudiesFilter;

class Studies extends Model
{
    use HasFactory;

    protected $table = 'studies';

    protected $primaryKey = 'id';

    protected $fillable = ['katedra', 'kryptis', 'programa'];

    public function users()
    {
        return $this->hasMany(User::class, 'studies');
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new StudiesFilter($request))->filter($builder);
    }
}
