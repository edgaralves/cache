<?php
/**
 * Cache Class
 *
 * @category    cache
 * @author      Edgar Alves
 * @since       16-09-2013
 * @version     0.1
 * @filesource  Cache.php
 */

namespace cache;

class Cache {
	/**
	 * Cache Object
	 *
	 * @var Cache_Interface
	 */
	private static $_cache;

	/**
	 * Class init
	 *
	 * @return Cache_Interface
	 */
	private static function init() {
		if (!self::$_cache) {
			if (class_exists("cache\\" . \Config::get('cacheSystem')->type, true)) {
				$cache = "cache\\" . \Config::get('cacheSystem')->type;
				self::$_cache = new $cache;
			} else {
				throw new \Exception("Cache Class not found");
			}
		}

		return self::$_cache;
	}

	/**
	 * Get Cached value from key
	 *
	 * @author Edgar      Alves
	 *
	 * @date   2013-09-16
	 *
	 * @param  string     $key  Key
	 *
	 * @return string
	 */
	public static function get($key) {
		$cache = self::init();

		return $cache->get($key);
	}

	/**
	 * Set Cache
	 *
	 * @author Edgar      Alves
	 *
	 * @date   2013-09-16
	 *
	 * @param  string     $key  Key
	 * @param  string     $data Data
	 * @param  integer     $expireTime Expire Time
	 */
	public function set($key, $data, $expireTime = null) {
		$cache = self::init();

		if (!$expireTime && \Config::get('cacheSystem')->expireTime) {
			$expireTime = \Config::get('cacheSystem')->expireTime;
		}

		return $cache->set($key, $data, $expireTime);
	}

	/**
	 * Delete Cached key
	 *
	 * @author Edgar      Alves
	 *
	 * @date   2013-09-16
	 *
	 * @param  string     $key  key
	 *
	 * @return void
	 */
	public function delete($key) {
		$cache = self::init();

		return $cache->delete($key);
	}

	/**
	 * Clear all keys from namespace
	 *
	 * @author Edgar      Alves
	 *
	 * @date   2013-09-16
	 *
	 * @param  string     $namespace  Namespace to clar
	 *
	 * @return void
	 */
	public function clear($namespace) {
		$cache = self::init();

		return $cache->clear($namespace);
	}
}