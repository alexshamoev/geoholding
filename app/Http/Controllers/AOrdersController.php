<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Module;

class AOrdersController extends AController
{
    public function get() {
		$data = array_merge(self::getDefaultData(),
								[
									'module' => Module::firstWhere('alias', 'orders'),
									'orders' => Order::All(),
								]);

      	return view('modules.orders.admin_panel.start_point', $data);
    }
}
