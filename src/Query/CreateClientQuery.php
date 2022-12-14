<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

class CreateClientQuery
{
    private string $createMode;
    private string $legalForm;
    private string $inn;
    private string $name;
    private string $mobilePhone = '';
    private string $epayNumber = '';
    private string $regNumber = '';
    private string $oksmNumber = '';

    /**
     * Client constructor.
     * @param string $createMode
     * @param string $legalForm
     * @param string $inn
     * @param string $name
     */
    public function __construct(string $createMode, string $legalForm, string $inn, string $name)
    {
        $this->createMode = $createMode;
        $this->legalForm = $legalForm;
        $this->inn = $inn;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCreateMode(): string
    {
        return $this->createMode;
    }

    /**
     * @param string $createMode
     * @return CreateClientQuery
     */
    public function setCreateMode(string $createMode): CreateClientQuery
    {
        $this->createMode = $createMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getLegalForm(): string
    {
        return $this->legalForm;
    }

    /**
     * @param string $legalForm
     * @return CreateClientQuery
     */
    public function setLegalForm(string $legalForm): CreateClientQuery
    {
        $this->legalForm = $legalForm;
        return $this;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @param string $inn
     * @return CreateClientQuery
     */
    public function setInn(string $inn): CreateClientQuery
    {
        $this->inn = $inn;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateClientQuery
     */
    public function setName(string $name): CreateClientQuery
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    /**
     * @param string $mobilePhone
     * @return CreateClientQuery
     */
    public function setMobilePhone(string $mobilePhone): CreateClientQuery
    {
        $this->mobilePhone = $mobilePhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEpayNumber(): string
    {
        return $this->epayNumber;
    }

    /**
     * @param string $epayNumber
     * @return CreateClientQuery
     */
    public function setEpayNumber(string $epayNumber): CreateClientQuery
    {
        $this->epayNumber = $epayNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegNumber(): string
    {
        return $this->regNumber;
    }

    /**
     * @param string $regNumber
     * @return CreateClientQuery
     */
    public function setRegNumber(string $regNumber): CreateClientQuery
    {
        $this->regNumber = $regNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getOksmNumber(): string
    {
        return $this->oksmNumber;
    }

    /**
     * Код страны регистрации юр.лица в соответствии с ОКСМ
     * @param string $oksmNumber
     * @return CreateClientQuery
     */
    public function setOksmNumber(string $oksmNumber): CreateClientQuery
    {
        $this->oksmNumber = $oksmNumber;
        return $this;
    }

    public function serialize(): array
    {
        return
            [
                'CreateMode' => $this->getCreateMode(),
                'LegalForm' => $this->getLegalForm(),
                'Inn' => $this->getInn(),
                'Name' => $this->getName(),
                'MobilePhone' => $this->getMobilePhone(),
                'EpayNumber' => $this->getEpayNumber(),
                'RegNumber' => $this->getRegNumber(),
                'OksmNumber' => $this->getOksmNumber(),
            ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
