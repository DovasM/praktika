<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\StudiesFilters\FakultetasFilter;
use App\Filters\StudiesFilters\KatedraFilter;
use App\Filters\StudiesFilters\KryptisFilter;
use App\Filters\StudiesFilters\ProgramaFilter;


class StudiesFilter extends AbstractFilter
{
    protected $filters = [
        'fakultetas' => FakultetasFilter::class,
        'katedra' => KatedraFilter::class,
        'kryptis' => KryptisFilter::class,
        'programa' => ProgramaFilter::class
    ];
}
