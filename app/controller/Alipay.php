<?php
namespace app\controller;

use app\BaseController;
use Yansongda\Pay\Pay;

class Alipay extends BaseController
{
    public function web()
    {
        $config = config('pay');
        Pay::config(array_merge($config, ['_force' => true]));

        // 注意返回类型为 Response，具体见详细文档
        return Pay::alipay()->web([
            'out_trade_no' => ''.time(),
            'total_amount' => '0.01',
            'subject' => 'yansongda 测试 - 1',
            '_method' => 'get',
        ]);
    }

    public function h5()
    {
        $config = config('pay');
        Pay::config(array_merge($config, ['_force' => true]));

        return Pay::alipay()->h5([
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'yansongda 测试 - 01',
            'quit_url' => 'https://yansongda.cn',
        ]);
    }
}
