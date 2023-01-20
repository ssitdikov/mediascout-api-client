<?php

declare(strict_types=1);

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;
use Ssitdikov\MediascoutApiClient\Query\Creative\GetCreativeQuery;
use Ssitdikov\MediascoutApiClient\Request\Creative\GetCreativesRequest;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$creative = new Creative();
$creative->setErid('....');

$query = new GetCreativeQuery($creative);

$result = $provider->getCreatives(new GetCreativesRequest($query));

var_dump($result);
