<?php

namespace App\Filters\UserFilters;

class ProgramaFilter
{
     public function filter($builder, $value)
    {
        $a = '%';
        $value .= $a;
        return $builder->where('programa', 'like',$value);
    }
}
