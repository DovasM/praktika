<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $primaryKey = 'id';
#ateityje padaryti sarysi Review.Salis su Post.Salis
    protected $fillable = ['Stud_ID', 'Salis', 'review'];

    public function atsiliepimai()
    {
        return $this->belongsTo(User::class, 'Stud_ID');
    }
}
