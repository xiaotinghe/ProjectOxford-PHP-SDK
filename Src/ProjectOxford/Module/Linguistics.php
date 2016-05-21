<?php
require_once ProjectOxford_ROOT_PATH . '/Module/Base.php';
/**
 * ProjectOxford_Module_Linguistics 
 * 云服务器模块类
 */
class ProjectOxford_Module_Linguistics extends ProjectOxford_Module_Base
{
    /**
     * $_serverHost
     * 接口域名
     * @var string
     */
    protected $_serverHost = 'https://api.projectoxford.ai/linguistics/v1.0/';
}