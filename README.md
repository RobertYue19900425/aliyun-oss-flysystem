# Flysystem Adapter for Aliyun OSS.

This is a Flysystem adapter for the Aliyun OSS ~2.0.4

## Installation

```bash
composer require moyue/aliyun-oss-flysystem dev-master
```

## run samples

```
cd vendor/moyue/aliyun-oss-flysystem/
vim samples/Config.php

modify the following config:
 const OSS_ACCESS_ID = '';
 const OSS_ACCESS_KEY = '';
 const OSS_ENDPOINT = '';
 const OSS_TEST_BUCKET = '';

php samples/AliyunOssFlysystem.php
```

## run tests

```bash
export OSS_ACCESS_KEY_ID=your id
export OSS_ACCESS_KEY_SECRET=your secret
export OSS_ENDPOINT=your endpoint
export OSS_BUCKET=your bucket
cd vendor/moyue/aliyun-oss-flysystem/
composer install
php vendor/bin/phpunit
```
