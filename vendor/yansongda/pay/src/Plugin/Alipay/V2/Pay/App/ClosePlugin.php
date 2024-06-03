<?php

declare(strict_types=1);

namespace Yansongda\Pay\Plugin\Alipay\V2\Pay\App;

use Closure;
use Yansongda\Artful\Contract\PluginInterface;
use Yansongda\Artful\Logger;
use Yansongda\Artful\Rocket;

/**
 * @see https://opendocs.alipay.com/open/ce0b4954_alipay.trade.close?pathHash=7b0fdae1&ref=api&scene=common
 */
class ClosePlugin implements PluginInterface
{
    public function assembly(Rocket $rocket, Closure $next): Rocket
    {
        Logger::debug('[Alipay][Pay][App][ClosePlugin] 插件开始装载', ['rocket' => $rocket]);

        $rocket->mergePayload([
            'method' => 'alipay.trade.close',
            'biz_content' => $rocket->getParams(),
        ]);

        Logger::info('[Alipay][Pay][App][ClosePlugin] 插件装载完毕', ['rocket' => $rocket]);

        return $next($rocket);
    }
}
