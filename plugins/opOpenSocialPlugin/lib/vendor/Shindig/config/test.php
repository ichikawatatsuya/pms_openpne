<?php

$shindigConfig = array(
  'debug' => false,

  'allow_plaintext_token' => false,

  'web_prefix' => '',
  'default_js_prefix' =>'/gadgets/js/',
  'default_iframe_prefix' => '/gadgets/ifr?',

  'allow_anonymous_token' => false,

  'token_cipher_key' => 'TEST KEY',
  'token_hmac_key'   => 'TEST KEY',
  'token_max_age'    => 60*60,

  'base_path'      => sfConfig::get('sf_plugins_dir').'/opOpenSocialPlugin/lib/vendor/Shindig/',
  'features_path'  => sfConfig::get('sf_plugins_dir').'/opOpenSocialPlugin/lib/vendor/Shindig/features/',
  'container_path' => sfConfig::get('sf_app_cache_dir').'/plugins/opOpenSocialPlugin',

  'private_key_file'  => sfConfig::get('sf_plugins_dir').'/opOpenSocialPlugin/test/certs/private.key',
  'public_key_file'   => sfConfig::get('sf_plugins_dir').'/opOpenSocialPlugin/test/certs/public.crt',
  'private_key_phrase' => 'TEST KEY',

  'remote_content'         => 'opShindigRemoteContent',
  'remote_content_fetcher' => 'opShindigRemoteContentFetcher',
  'security_token_signer'  => 'opShindigSecurityTokenDecoder',
  'security_token'         => 'opShindigSecurityToken',
  'oauth_lookup_service'   => 'opShindigOAuthLookupService',

  'gadget_class' => 'Shindig_Gadget',

  'data_cache'    => 'opShindigCacheStorageFile',
  'feature_cache' => 'opShindigCacheStorageFile',

  'person_service'     => 'opOpenSocialPersonService',
  'activity_service'   => 'opOpenSocialActivityService',
  'app_data_service'   => 'opOpenSocialAppDataService',
  'messages_service'   => 'opOpenSocialMessagesService',
  'album_service'      => 'opOpenSocialAlbumService',
  'media_item_service' => 'opOpenSocialMediaItemService',

  'cache_time' => 'TEST KEY',
  'cache_root' => sfConfig::get('sf_app_cache_dir').'/plugins/opOpenSocialPlugin',

  'curl_connection_timeout' => '15',
);
