<?php

use think\facade\Env;
use Yansongda\Pay\Pay;
return  [
    'alipay' => [
        'default' => [
            // 必填-支付宝分配的 app_id
            'app_id' => Env::get('ALIPAY.app_id', ''),
            // 必填-应用私钥 字符串或路径
            // 在 https://open.alipay.com/develop/manage 《应用详情->开发设置->接口加签方式》中设置
            'app_secret_cert' => Env::get('ALIPAY.app_secret_cert', ""),
            // 必填-应用公钥证书 路径
            // 设置应用私钥后，即可下载得到以下3个证书
            'app_public_cert_path' => Env::get('ALIPAY.app_public_cert_path', ""),
            // 必填-支付宝公钥证书 路径
            'alipay_public_cert_path' => Env::get('ALIPAY.alipay_public_cert_path', ""),
            // 必填-支付宝根证书 路径
            'alipay_root_cert_path' => Env::get('ALIPAY.alipay_root_cert_path', ""),
            'return_url' => Env::get('ALIPAY.return_url', 'https://yansongda.cn/alipay/return'),
            'notify_url' => Env::get('ALIPAY.notify_url', 'https://yansongda.cn/alipay/notify'),
            // 选填-第三方应用授权token
            'app_auth_token' => Env::get('ALIPAY.app_auth_token', ''),
            // 选填-服务商模式下的服务商 id，当 mode 为 Pay::MODE_SERVICE 时使用该参数
            'service_provider_id' => Env::get('ALIPAY.service_provider_id', ''),
            // 选填-默认为正常模式。可选为： MODE_NORMAL, MODE_SANDBOX, MODE_SERVICE
            'mode' => Pay::MODE_NORMAL,
        ]
    ],
    'wechat' => [
        'default' => [
            // 必填-商户号，服务商模式下为服务商商户号
            // 可在 https://pay.weixin.qq.com/ 账户中心->商户信息 查看
            'mch_id' => Env::get('WECHAT.mch_id', ''),
            // 选填-v2商户私钥
            'mch_secret_key_v2' => Env::get('WECHAT.mch_secret_key_v2', ''),
            // 必填-v3 商户秘钥
            // 即 API v3 密钥(32字节，形如md5值)，可在 账户中心->API安全 中设置
            'mch_secret_key' => Env::get('WECHAT.mch_secret_key', ''),
            // 必填-商户私钥 字符串或路径
            // 即 API证书 PRIVATE KEY，可在 账户中心->API安全->申请API证书 里获得
            // 文件名形如：apiclient_key.pem
            'mch_secret_cert' => Env::get('WECHAT.mch_secret_cert', ''),
            // 必填-商户公钥证书路径
            // 即 API证书 CERTIFICATE，可在 账户中心->API安全->申请API证书 里获得
            // 文件名形如：apiclient_cert.pem
            'mch_public_cert_path' => Env::get('WECHAT.mch_public_cert_path', ''),
            // 必填-微信回调url
            // 不能有参数，如?号，空格等，否则会无法正确回调
            'notify_url' => Env::get('WECHAT.notify_url', ''),
            // // 选填-公众号 的 app_id
            // // 可在 mp.weixin.qq.com 设置与开发->基本配置->开发者ID(AppID) 查看
            // 'mp_app_id' => Env::get('WECHAT.mp_app_id', ''),
            // // 选填-小程序 的 app_id
            // 'mini_app_id' => Env::get('WECHAT.mini_app_id', ''),
            // // 选填-app 的 app_id
            // 'app_id' => Env::get('WECHAT.app_id', ''),
            // // 选填-服务商模式下，子公众号 的 app_id
            // 'sub_mp_app_id' => Env::get('WECHAT.sub_mp_app_id', ''),
            // // 选填-服务商模式下，子 app 的 app_id
            // 'sub_app_id' => Env::get('WECHAT.sub_app_id', ''),
            // // 选填-服务商模式下，子小程序 的 app_id
            // 'sub_mini_app_id' => Env::get('WECHAT.sub_mini_app_id', ''),
            // // 选填-服务商模式下，子商户id
            // 'sub_mch_id' => Env::get('WECHAT.sub_mch_id', ''),
            // // 选填-微信平台公钥证书路径, optional，强烈建议 php-fpm 模式下配置此参数
            // 'wechat_public_cert_path' => [
            //     // '45F59D4DABF31918AFCEC556D5D2C6E376675D57' => __DIR__.'/Cert/wechatPublicKey.crt',
            // ],
            // // 选填-默认为正常模式。可选为： MODE_NORMAL, MODE_SERVICE
            // 'mode' => Pay::MODE_NORMAL,
        ]
    ],
    'unipay' => [
        'default' => [
            // 必填-商户号
            'mch_id' => '777290058167151',
            // 选填-商户密钥：为银联条码支付综合前置平台配置：https://up.95516.com/open/openapi?code=unionpay
            'mch_secret_key' => '979da4cfccbae7923641daa5dd7047c2',
            // 必填-商户公私钥
            'mch_cert_path' => __DIR__.'/Cert/unipayAppCert.pfx',
            // 必填-商户公私钥密码
            'mch_cert_password' => '000000',
            // 必填-银联公钥证书路径
            'unipay_public_cert_path' => __DIR__.'/Cert/unipayCertPublicKey.cer',
            // 必填
            'return_url' => 'https://yansongda.cn/unipay/return',
            // 必填
            'notify_url' => 'https://yansongda.cn/unipay/notify',
            'mode' => Pay::MODE_NORMAL,
        ],
    ],
    'logger' => [
        'enable' => false,
        'file' => './logs/pay.log',
        'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
        'type' => 'single', // optional, 可选 daily.
        'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
    ],
    'http' => [ // optional
        'timeout' => 5.0,
        'connect_timeout' => 5.0,
        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
    ],
];
