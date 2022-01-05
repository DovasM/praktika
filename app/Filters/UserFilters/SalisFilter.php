<?php

namespace App\Filters\UserFilters;

class SalisFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('Salis', 'like',$value);
    }
}
