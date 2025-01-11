<?php

namespace App\Exports;

use App\Models\BetaAgent;
use App\Models\BetaDeveloper;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;
class BetaDevelopersExport implements FromCollection, WithHeadings, WithMapping,ShouldAutoSize
{
    use Exportable;


    public function __construct()
    {
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $loggedInUserId = Auth::user()->id;
        $betaAgentInstance = new BetaDeveloper();

        $results = $betaAgentInstance->loadBetaDeveloper([],[],[]);
        return $results;
    }

    public function headings(): array
    {
        return [
            'Developer Name',
            'Email',
            'Mobile Number',
            'Company Name',
            'Country',
            'Date Added' ];
    }

    public function map($user): array
    {

        return [
            $user->name ?? '-----',
            $user->email ?? '-----',
            $user->phone ?? '-----',
            $user->company_name ?? '-----',
            $user->country ?? '-----',
            date('d/m/Y',strtotime($user->created_at))
        ];
    }
}
