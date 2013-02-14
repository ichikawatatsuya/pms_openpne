<?php

/**
 * PluginAlbum
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    opAlbumPlugin
 * @subpackage model
 */
abstract class PluginAlbum extends BaseAlbum
{
  protected
    $previous = array(),
    $next = array();

  public function getPublicFlagLabel()
  {
    $publicFlags = $this->getTable()->getPublicFlags();

    return $publicFlags[$this->getPublicFlag()];
  }

  public function getPrevious($myMemberId = null)
  {
    if (null == $myMemberId)
    {
      $myMemberId = sfContext::getInstance()->getUser()->getMemberId();
    }

    if (null == $this->previous[$myMemberId])
    {
      $this->previous[$myMemberId] = $this->getTable()->getPreviousAlbum($this, $myMemberId);
    }

    return $this->previous[$myMemberId];
  }

  public function getNext($myMemberId = null)
  {
    if (null == $myMemberId)
    {
      $myMemberId = sfContext::getInstance()->getUser()->getMemberId();
    }

    if (null == $this->next[$myMemberId])
    {
      $this->next[$myMemberId] = $this->getTable()->getNextAlbum($this, $myMemberId);
    }

    return $this->next[$myMemberId];
  }

  public function getCoverImage()
  {
    $file = $this->getFile();

    if ($file->id)
    {
      return $file;
    }
    return null;
  }

  public function getAlbumImages()
  {
    $images = Doctrine::getTable('AlbumImage')->findByAlbumId($this->getId());

    $result = array();
    foreach ($images as $image)
    {
      $result[$image->getFile_id()] = $image;
    }

    return $result;
  }

  public function isAuthor($memberId)
  {
    return ($this->getMemberId() == $memberId);
  }

  public function isViewable($memberId)
  {
    $flags = $this->getTable()->getViewablePublicFlags(
      $this->getTable()->getPublicFlagByMemberId($this->getMemberId(), $memberId)
    );

    return in_array($this->getPublicFlag(), $flags);
  }
}
