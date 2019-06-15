<?php

namespace App\Exports;

use App\order as OrderModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function collection()
    {
    	$data = OrderModel::selectRaw('agent , extract(month from created_at) as MONTH, extract(year from created_at) as YEAR, sum(total_award_point) as SUM')
		->groupBy( 'agent')
		->get();

		return $data;
    }
}
