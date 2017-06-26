<?php

namespace Moyue\Flysystem\AliyunOss;

use Storage;
use OSS\OssClient;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Moyue\Flysystem\AliyunOss\Plugins\PutFile;
use Moyue\Flysystem\AliyunOss\Plugins\SignedDownloadUrl;

/**
 * Aliyun Oss ServiceProvider class.
 *
 * @author  RobertYue1990425 <yueqiankun@163.com>
 */
class AliyunOssServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('oss', function ($app, $config) {
            $accessId = $config['access_id'];
            $accessKey = $config['access_key'];
            $endPoint = $config['endpoint'];
            $bucket = $config['bucket'];

            $prefix = null;
            if (isset($config['prefix'])) {
                $prefix = $config['prefix'];
            }

            $client = new OssClient($accessId, $accessKey, $endPoint);
            $adapter = new AliyunOssAdapter($client, $bucket, $prefix);

            $filesystem = new Filesystem($adapter);
            $filesystem->addPlugin(new PutFile());
            $filesystem->addPlugin(new SignedDownloadUrl());

            return $filesystem;
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
