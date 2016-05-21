<?php
require_once ProjectOxford_ROOT_PATH . '/Module/Base.php';
/**
 * ProjectOxford_Module_TextAnalytics
 * 云服务器模块类
 */
class ProjectOxford_Module_TextAnalytics extends ProjectOxford_Module_Base
{
    /**
     * $_serverHost
     * 接口域名
     * @var string
     */
    protected $_serverHost = 'https://westus.api.cognitive.microsoft.com/text/analytics/v2.0/';
}