<?php

namespace App\Filters\UserFilters;

class EmailFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('fakultetas', 'like',$value);
    }
}
