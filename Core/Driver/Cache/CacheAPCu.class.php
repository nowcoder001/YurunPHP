<?php
/**
 * APCu缓存驱动类
 * 需要apcu扩展支持
 * @author Yurun <yurun@yurunsoft.com>
 * @copyright 宇润软件(Yurunsoft.Com) All rights reserved.
 */
class CacheAPCu extends CacheBase
{
	/**
	 * 清空缓存
	 * @return bool
	 */
	public function clear()
	{
		return apcu_clear_cache();
	}

	/**
	 * 获取缓存内容
	 * @param string $alias 别名
	 * @param mixed $default 默认值或者回调
	 * @param array $config 配置
	 * @return mixed
	 */
	public function get($alias, $default = false, $config = array())
	{
		$result = apcu_fetch($alias,$success);
		if(false === $success)
		{
			return $this->parseDefault($default);
		}
		else
		{
			return $result;
		}
	}

	/**
	 * 删除缓存
	 * @param string $alias 别名
	 * @param array $config 配置
	 * @return bool
	 */
	public function remove($alias, $config = array())
	{
		return apcu_delete($alias);
	}

	/**
	 * 设置缓存
	 * @param string $alias 别名
	 * @param string $value 缓存内容
	 * @param array $config 配置
	 * @return bool
	 */
	public function set($alias, $value, $config = array())
	{
		$ttl = isset($config['ttl']) ? $config['ttl'] : 0;
		return apcu_store($alias,$value,$ttl);
	}

	/**
	 * 缓存是否存在
	 * @param string $alias 别名
	 * @param array $config 配置
	 * @return bool
	 */
	public function exists($alias, $config = array())
	{
		return apcu_exists($alias);
	}
}