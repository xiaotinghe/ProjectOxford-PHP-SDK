# ProjectOxford-PHP-SDK

~~~
<?php
require_once './src/QcloudApi/QcloudApi.php';

$config = array('SecretId'       => '你的secretId',
                'SecretKey'      => '你的secretKey',
                'RequestMethod'  => 'GET',
                'DefaultRegion'  => '区域参数');

// 第一个参数表示使用哪个域名
// 已有的模块列表：
// QcloudApi::MODULE_CVM      对应   cvm.api.qcloud.com
// QcloudApi::MODULE_CDB      对应   cdb.api.qcloud.com
// QcloudApi::MODULE_LB       对应   lb.api.qcloud.com
// QcloudApi::MODULE_TRADE    对应   trade.api.qcloud.com
// QcloudApi::MODULE_SEC      对应   csec.api.qcloud.com
// QcloudApi::MODULE_IMAGE    对应   image.api.qcloud.com
// QcloudApi::MODULE_MONITOR  对应   monitor.api.qcloud.com
// QcloudApi::MODULE_CDN      对应   cdn.api.qcloud.com
$service = QcloudApi::load(QcloudApi::MODULE_CVM, $config);

// 请求参数，请参考wiki文档上对应接口的说明
$package = array('offset' => 0,
                 'limit' => 3,
                 // 'Region' => 'gz' // 当Region不是上面配置的DefaultRegion值时，可以重新指定请求的Region
                );


// 请求前可以通过下面四个方法重新设置请求的secretId/secretKey/region/method参数
// 重新设置secretId
$secretId = '你的secretId';
$service->setConfigSecretId($secretId);
// 重新设置secretKey
$secretKey = '你的secretKey';
$service->setConfigSecretKey($secretKey);
// 重新设置region
$region = 'sh';
$service->setConfigDefaultRegion($region);
// 重新设置method
$method = 'POST';
$service->setConfigRequestMethod($method);

// 请求方法为对应接口的接口名，请参考wiki文档上对应接口的接口名
$a = $service->DescribeInstances($package);

// 生成请求的URL，不发起请求
$a = $service->generateUrl('DescribeInstances', $package);

if ($a === false) {
    // 请求失败，解析错误信息
    $error = $service->getError();
    echo "Error code:" . $error->getCode() . ' message:' . $error->getMessage();

    // 对于异步任务接口，可以通过下面的方法获取对应任务执行的信息
    $detail = $error->getExt();
} else {
    // 请求成功
    var_dump($a);
}
~~~
