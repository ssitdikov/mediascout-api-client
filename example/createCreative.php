
<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQueryChild\CreativeMediaDataItem;
use Ssitdikov\MediascoutApiClient\Request\CreateCreativeRequest;
use Ssitdikov\MediascoutApiClient\Response\PingResponse;
use Symfony\Component\Dotenv\Dotenv;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQuery;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQueryChild\CreativeTextDataItem;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$creativeQuery = new CreateCreativeQuery(
    'AAADgMygKIOkyGuPzl83W1ow',
    'CT6WZbMXPGcE2lx5Zfm-npAg',
    'CPM',
    'TextGraphic',
    'http://26OONA8OND1YOZT0YV3IOU60MU8.int'
);
$creativeQuery->setDescription('Описание креатива 4H67RLZG');
$creativeQuery->setTargetAudience('Тестовый креатив');
$creativeQuery->setIsSocial(true);
$creativeQuery->setOkvedCodes(['Код ОКВЭД']);

//$mediaData = new CreativeMediaDataItem('Название файла');
$textData = new CreativeTextDataItem('Некий текст');

$creativeQuery->setTextData($textData);
try {
    $result = $provider->execute(new CreateCreativeRequest($creativeQuery));
} catch (HostNotFoundException $exception) {

}

print $result->getHost();