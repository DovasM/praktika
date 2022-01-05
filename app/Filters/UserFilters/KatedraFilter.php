<?php

namespace App\Filters\UserFilters;

class KatedraFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('katedra', 'like',$value);
    }
}
