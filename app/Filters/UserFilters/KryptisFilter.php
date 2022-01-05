<?php

namespace App\Filters\UserFilters;

class KryptisFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        // dd($builder->where('kryptis', $value));
        return $builder->where('kryptis', 'like' ,$value);
    }
}
