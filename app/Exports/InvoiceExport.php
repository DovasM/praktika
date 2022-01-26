<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class InvoiceExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function headings(): array
    {
        return [
            'ID',
            'Vardas',
            'Pavardė',
            'Email',
            'Fakultetas',
            'Katedra',
            'Studijų kryptis',
            'Studijų programa',
            'Šalis',
            'Universitetas',
            'Metai'
        ];
    }

    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }

    public function collection()
    {
        return $this->invoices;
    }
}
