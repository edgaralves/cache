<?php
/**
 * Cache Interface
 *
 * @category    cache
 * @author      Edgar Alves
 * @since       16-09-2013
 * @version     0.1
 * @filesource  Cache_Interface.php
 */
namespace cache;

interface Cache_Interface {
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
	public function get($key);

	/**
	 * Set Cache
	 *
	 * @author Edgar      Alves
	 *
	 * @date   2013-09-16
	 *
	 * @param  string     $key  Key
	 * @param  string     $data Data
	 */
	public function set($key, $data, $expireTime = null);

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
	public function delete($key);

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
	public function clear($namespace);
}