<?php
namespace app\controller;

use app\BaseController;
use Yansongda\Pay\Pay;

class Wechat extends BaseController
{
    public function web()
    {
        $config = config('pay');
        Pay::config(array_merge($config, ['_force' => true]));
		// halt($config);
		
		$order = [
		    'out_trade_no' => time().'',
		    'description' => 'subject-测试',
		    'amount' => [
		        'total' => 1,
		    ],
		    'scene_info' => [
		        'payer_client_ip' => '1.2.4.8',
		        'h5_info' => [
		            'type' => 'Wap',
		        ]
		    ],
		];
		
		return Pay::wechat()->h5($order);
		// 二维码内容： $qr = $result->code_url;
        
    }

}
