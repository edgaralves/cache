<?php
/**
 * APC Cache
 *
 * @category    cache
 * @author      Edgar Alves
 * @since       16-09-2013
 * @version     0.1
 * @filesource  APC.php
 */

namespace cache;

class APC implements Cache_Interface {
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
		if (apc_exists($key)) {
			return apc_fetch($key);
		}
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
		if (!$expireTime && \Config::get('cacheSystem')->expireTime) {
			$expireTime = \Config::get('cacheSystem')->expireTime;
		}

		return apc_store($key, $data, $expireTime);
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
		if (apc_exists($key)) {
			return apc_delete($key);
		} else {
			return true;
		}
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
		/**
		 * APC doesn't have this functionality
		 */
		return '';
	}
}