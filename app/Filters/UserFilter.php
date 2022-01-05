<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use App\Filters\UserFilters\EmailFilter;
use App\Filters\UserFilters\KatedraFilter;
use App\Filters\UserFilters\KryptisFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\UserFilters\NameFilter;
use App\Filters\UserFilters\LastNameFilter;
use App\Filters\UserFilters\MetaiFilter;
use App\Filters\UserFilters\ProgramaFilter;
use App\Filters\UserFilters\SalisFilter;
use App\Filters\UserFilters\UniversitetasFilter;

class UserFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameFilter::class,
        'last_name' => LastNameFilter::class,
        'email' => EmailFilter::class,
        'katedra' => KatedraFilter::class,
        'kryptis' => KryptisFilter::class,
        'Metai' => MetaiFilter::class,
        'programa' => ProgramaFilter::class,
        'Universitetas' => UniversitetasFilter::class,
        'Salis' => SalisFilter::class
    ];
}
