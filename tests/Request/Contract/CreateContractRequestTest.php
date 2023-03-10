<?php

namespace Request\Contract;

use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;
use Ssitdikov\MediascoutApiClient\Query\Contract\ContractQuery;
use Ssitdikov\MediascoutApiClient\Request\Contract\CreateContractRequest;
use PHPUnit\Framework\TestCase;

class CreateContractRequestTest extends TestCase
{
    public function testGetParams()
    {
        $contract = (new Contract())
            ->setNumber('MediationContract_060')
            ->setDate(new \DateTime())
            ->setAmount(345180)
            ->setVatIncluded(true)
            ->setFinalContractId('CT6sPzxMa0KkuWWlu8HQf_-g')
            ->setContractorId('AGwalWb797nUOJzo7tdHkBrg')
            ->setClientId('CLZPHWhfJK9k-HcjO_fL14cA')
            ->setType('MediationContract')
            ->setSubjectType('MediationContract')
            ->setActionType('Other')
            ->setParentMainContractId('Avsadasdasdas');

        $request = new CreateContractRequest(new ContractQuery($contract));

        $result = json_encode($request->getParams()['json']);
        $result = json_decode($result, true);

        $expected = array(
            'number' => 'MediationContract_060',
            'vatIncluded' => true,
            'clientId'=> 'CLZPHWhfJK9k-HcjO_fL14cA',
            'type' => 'MediationContract',
            'amount' => 345180,
            'subjectType' => 'MediationContract',
            'actionType' => 'Other',
            'parentMainContractId' => 'Avsadasdasdas',
            'contractorId' => 'AGwalWb797nUOJzo7tdHkBrg',
            'finalContractId' => 'CT6sPzxMa0KkuWWlu8HQf_-g'
        );

        self::assertSame($expected['number'], $result['number']);
        self::assertSame($expected['vatIncluded'], $result['vatIncluded']);
        self::assertSame($expected['clientId'], $result['clientId']);
        self::assertSame($expected['type'], $result['type']);
        self::assertSame($expected['amount'], $result['amount']);
        self::assertSame($expected['subjectType'], $result['subjectType']);
        self::assertSame($expected['actionType'], $result['actionType']);
        self::assertSame($expected['parentMainContractId'], $result['parentMainContractId']);
        self::assertSame($expected['contractorId'], $result['contractorId']);
        self::assertSame($expected['finalContractId'], $result['finalContractId']);
    }
}
