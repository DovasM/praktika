<?php

namespace App\Filters\UserFilters;

class NameFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('name', 'like',$value);
    }
}
