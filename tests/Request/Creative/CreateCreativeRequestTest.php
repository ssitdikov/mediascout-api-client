<?php

namespace Request\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;
use Ssitdikov\MediascoutApiClient\Query\Creative\CreativeQuery;
use Ssitdikov\MediascoutApiClient\Request\Creative\CreateCreativeRequest;
use PHPUnit\Framework\TestCase;

class CreateCreativeRequestTest extends TestCase
{
    public function testGetParams()
    {
        $creative = (new Creative())
            ->setInitialContractId('AAADgMygKIOkyGuPzl83W1ow')
            ->setFinalContractId('CT6WZbMXPGcE2lx5Zfm-npAg')
            ->setType('CPM')
            ->setForm('TextGraphic')
            ->setAdvertiseUrl('http://26OONA8OND1YOZT0YV3IOU60MU8.int')
            ->setDescription('Описание креатива 4H67RLZG')
            ->setTargetAudience('Тестовый креатив')
            ->setIsSocial(true)
            ->setMediaData(['Некий текст'])
            ->setTextData(['Some text']);

        $request = new CreateCreativeRequest(new CreativeQuery($creative));

        $result = json_encode($request->getParams()['json']);
        $result = json_decode($result, true);

        $expected = array(
            'initialContractId' => 'AAADgMygKIOkyGuPzl83W1ow',
            'finalContractId' => 'CT6WZbMXPGcE2lx5Zfm-npAg',
            'type' => 'CPM',
            'form' => 'TextGraphic',
            'advertiserUrl' => 'http://26OONA8OND1YOZT0YV3IOU60MU8.int',
            'description' => 'Описание креатива 4H67RLZG',
            'targetAudience' => 'Тестовый креатив',
            'isSocial' => true,
            'mediaData' => ['Некий текст'],
            'textData' => ['Some text']
        );

        self::assertSame($expected['initialContractId'], $result['initialContractId']);
        self::assertSame($expected['finalContractId'], $result['finalContractId']);
        self::assertSame($expected['type'], $result['type']);
        self::assertSame($expected['form'], $result['form']);
        self::assertSame($expected['advertiserUrl'], $result['advertiserUrl']);
        self::assertSame($expected['description'], $result['description']);
        self::assertSame($expected['targetAudience'], $result['targetAudience']);
        self::assertSame($expected['isSocial'], $result['isSocial']);
        self::assertSame($expected['mediaData'], $result['mediaData']);
        self::assertEquals($expected['textData'], $result['textData']);
    }
}
