<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order as OrderModel;
use DB;
use App\Exports\OrderExport as x;
use Excel;

class order extends Controller
{
	public function addNewOrder($collection)
	{

		foreach($collection['orders'] as $i => $v)
		{

			OrderModel::create([
				'order_no' => $v['ORDER_NO'],
				'agent'    => $v['AGENT'],
				'customer' => $v['CUSTOMER'],
				'status'   => $v['STATUS'],
				'product'  => $v['PRODUCT'],
				'sku'      => $v['SKU'],
				'total_award_point' => $v['TOTAL_AWARD_POINT'],
				'discount' => $v['DISCOUNT'],
				'subtotal' => $v['SUBTOTAL'],
				'created_at' => $v['ORDER_CREATED_AT']
			]); 

		}
		$data = OrderModel::selectRaw('agent , extract(month from created_at) as MONTH, extract(year from created_at) as YEAR, product, sum(total_award_point) as SUM')
		->groupBy( 'agent')
		->get();

    //   return Excel::download(new x(), 'users.csv');

		dd(($data));
	}

}
