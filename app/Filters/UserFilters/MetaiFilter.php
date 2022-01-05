<?php

namespace App\Filters\UserFilters;

class MetaiFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('Metai', 'like',$value);
    }
}
