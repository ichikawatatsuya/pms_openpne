<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opShindigCacheStorageFile
 *
 * @package    opOpenSocialPlugin
 * @subpackage util
 * @author     Shogo Kawahara <kawahara@bucyou.net>
 * @see        CacheStorageFile
 */
class opShindigCacheStorageFile extends CacheStorageFile
{
  protected $prefix = null;

  public function __construct($name)
  {
    $this->prefix = $name;
  }

  private function getCacheDir($key)
  {
    return Shindig_Config::get('cache_root').'/'.$this->prefix.'/'.substr($key, 0, 2);
  }

  private function getCacheFile($key)
  {
    return $this->getCacheDir($key).'/'.$key;
  }

  public function store($key, $value)
  {
    $cacheDir = $this->getCacheDir($key);
    $cacheFile = $this->getCacheFile($key);
    if (! is_dir($cacheDir)) {
      $old = umask(0);
      if (! @mkdir($cacheDir, 0777, true)) {
        throw new CacheException("Could not create cache directory");
      }
      umask($old);
    }

    return file_put_contents($cacheFile, $value);
  }

  public function fetch($key) {
    $cacheFile = $this->getCacheFile($key);
    if (Shindig_File::exists($cacheFile) && Shindig_File::readable($cacheFile)) {
      return @file_get_contents($cacheFile);
    }
    return false;
  }

  public function delete($key) {
    $cacheFile = $this->getCacheFile($key);
    if (! @unlink($cacheFile)) {
      throw new CacheException("Cache file could not be deleted");
    }
  }

  public function lock($key)
  {
    $cacheDir = $this->getCacheDir($key);
    $cacheFile = $this->getCacheFile($key);
    if (! is_dir($cacheDir)) {
      $old = umask(0);
      if (! @mkdir($cacheDir, 0777, true)) {
        // make sure the failure isn't because of a concurency issue
        if (! is_dir($cacheDir)) {
          throw new CacheException("Could not create cache directory");
        }
      }
      umask($old);
    }
    @touch($cacheFile.'.lock');
  }

  public function unlock($key)
  {
    $cacheFile = $this->getCacheFile($key);
    @unlink($cacheFile.'.lock');
  }
}
