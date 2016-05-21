<?php
// 目录入口
define('ProjectOxford_ROOT_PATH', dirname(__FILE__));
/**
 * ProjectOxford
 * SDK入口文件
 */
class ProjectOxford
{
    /**
     * Face
     * 人脸识别
     */
    const Face   = 'Face';
    /**
     * Emotion
     * 情绪识别
     */
    const Emotion   = 'Emotion';
    /**
     * Video
     * 视频检测
     */
    const Video    = 'Video';
    /**
     * Vision
     * 计算机视觉
     */
    const Vision = 'Vision';
    
    /**
     * load
     * 加载模块文件
     * @param  string $moduleName   模块名称
     * @param  array  $moduleConfig 模块配置
     * @return
     */
    public static function load($moduleName, $moduleConfig = array())
    {
        $moduleName = ucfirst($moduleName);
        $moduleClassFile = ProjectOxford_ROOT_PATH . '/Module/' . $moduleName . '.php';
        if (!file_exists($moduleClassFile)) {
            return false;
        }
        require_once $moduleClassFile;
        $moduleClassName = 'ProjectOxford_Module_' . $moduleName;
        $moduleInstance = new $moduleClassName();
        if (!empty($moduleConfig)) {
            $moduleInstance->setConfig($moduleConfig);
        }
        return $moduleInstance;
    }
}