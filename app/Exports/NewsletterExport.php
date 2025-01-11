<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;
class NewsletterExport implements FromCollection, WithHeadings, WithMapping,ShouldAutoSize
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
        $newsletterInstance = new Newsletter();

        $results = $newsletterInstance->loadNewsletters([],[],[]);
        return $results;
    }

    public function headings(): array
    {
        return [
            'Email',
            'Subscribed On' ];
    }

    public function map($user): array
    {

        return [
            $user->email ?? '-----',
            date('d/m/Y',strtotime($user->created_at))
        ];
    }
}
