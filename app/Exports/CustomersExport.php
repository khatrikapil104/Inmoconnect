<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;
class CustomersExport implements FromCollection, WithHeadings, WithMapping,ShouldAutoSize
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
        $customerInviteInstance = new User();
        if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' ){
            $results = $customerInviteInstance->loadUserMembers(['user_role_id' => getUserRoleId('customer') , 'withSelf' => false, ], [], []);
        }else{
            $results = $customerInviteInstance->loadUserMembers([ 'userId' => $loggedInUserId, 'user_role_id' => getUserRoleId('customer') , 'withSelf' => false], [], []);
        }
        return $results;
    }

    public function headings(): array
    {
        return [
            'Customer Name',
            'Email',
            'Mobile Number',
            'Date Added',
            'Last Login',
            'Status'
        ];
    }

    public function map($user): array
    {

        return [
            $user->name ?? '-----',
            $user->email ?? '-----',
            $user->phone ?? '-----',
            date('d/m/Y',strtotime($user->created_at)),
            !empty($user->last_login) ? date('d/m/Y',strtotime($user->last_login)) : '-----' ,
            ($user->is_active == 1) ? 'Active' : 'Inactive',
        ];
    }
}
