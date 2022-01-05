<?php

namespace App\Filters\UserFilters;

class LastNameFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('last_name', 'like',$value);
    }
}
