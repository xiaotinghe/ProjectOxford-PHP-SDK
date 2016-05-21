<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once './src/ProjectOxford/Api.php';

$config = array('Subscription-Key'  => '填写您的订阅key',
                'Content-Type' => 'Body的Content-Type',
                'Request-Method'=> 'POST',
                );

$service = ProjectOxford::load(ProjectOxford::Vision, $config);

// 请求参数，请参考官方Api文档上对应接口的说明
$parameters = array('language' => 'zh-Hans',
                 'detectOrientation' => true
                );

//请求Body，请参考官方Api文档上对应接口的说明
$package =  '{"url":"http://example.com/1.jpg"}' ;


//$a = $service->generateUrl('Ocr', $parameters, $package);
$a = $service->Ocr($parameters, $package);
if ($a === false) {
    $error = $service->getError();
    echo "Error code:" . $error->getCode() . ".\n";
    echo "message:" . $error->getMessage() . ".\n";
    echo "ext:" . var_export($error->getExt(), true) . ".\n";
} else {
    var_dump($a);
}
