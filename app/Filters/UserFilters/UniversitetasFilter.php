<?php

namespace App\Filters\UserFilters;

class UniversitetasFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('Universitetas', 'like',$value);
    }
}
