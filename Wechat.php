<?php
namespace tyus\wechat;

use Yii;
use tyus\wechat\sdk\Wechat as WechatSdk;
use tyus\wechat\sdk\ErrCode;

class Wechat extends WechatSdk
{
	public function getError() {
		return ErrCode::getErrText($this->errCode);
	}
	/**
     * 重写设置缓存
     * @param string $cachename
     * @param mixed $value
     * @param int $expired 缓存秒数，如果为0则为长期缓存
     * @return boolean
     */
    protected function setCache($cachename,$value,$expired=0){
    	return Yii::$app->cache->set($cachename, $value, $expired);
    }

    /**
     * 重写获取缓存
     * @param string $cachename
     * @return mixed
     */
    protected function getCache($cachename){
        return Yii::$app->cache->get($cachename);
    }

    protected function removeCache($cachename){
		return Yii::$app->cache->delete($cachename);
	}

	/**
     * log overwrite
     * @param string|array $log
     */
    protected function log($log){
    	Yii::info($log);
    }
}