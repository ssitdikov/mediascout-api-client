<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

use DateTime;
use Ssitdikov\MediascoutApiClient\Query\Contract\FinalContractQuery;

class CreateFinalContractQuery extends FinalContractQuery
{
    public function serialize(): array
    {
        return
            [
                'number' => $this->getNumber(),
                'date' => $this->getDate()->format("Y-m-d"),
                'vatIncluded' => $this->isVatIncluded(),
                'clientId' => $this->getClientId(),
                'type' => $this->getType(),
                'amount' => $this->getAmount(),
                'subjectType' => $this->getSubjectType(),
                'actionType' => $this->getActionType(),
                'parentMainContractId' => $this->getParentMainContractId()
            ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
