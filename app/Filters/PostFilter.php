<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use App\Filters\PostFilters\MetaiFilter;
use App\Filters\PostFilters\SalisFilter;
use App\Filters\PostFilters\UniversitetasFilter;
use Illuminate\Database\Eloquent\Builder;


class PostFilter extends AbstractFilter
{
    protected $filters = [
        'Salis' => SalisFilter::class,
        'Metai' => MetaiFilter::class,
        'Universitetas' => UniversitetasFilter::class
    ];
}
