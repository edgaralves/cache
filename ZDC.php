<?php
/**
 * Zend Data Cache
 *
 * @category    cache
 * @author      Edgar Alves
 * @since       16-09-2013
 * @version     0.1
 * @filesource  ZDC.php
 */

namespace cache;

class ZDC implements Cache_Interface {
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
	public function get($key) {
		return zend_shm_cache_fetch($key);
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
	 * @param  integer    $expireTime Time to expire
	 *
	 * return Boolean
	 */
	public function set($key, $data, $expireTime = null) {
		return zend_shm_cache_store($key, $data, $expireTime);
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
	 * @return Boolean
	 */
	public function delete($key) {
		return zend_shm_cache_delete($key);
	}

	/**
	 * Clear all keys from namespace
	 *
	 * @author Edgar      Alves
	 *
	 * @date   2013-09-16
	 *
	 * @param  string     $namespace  Namespace to clear
	 *
	 * @return void
	 */
	public function clear($namespace) {
		return zend_shm_cache_clear($namespace);
	}
}