<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object\Client;

class Client implements \JsonSerializable
{
    /**
     * API значение
     * @var string
     */
    private string $id = '';

    private string $legalForm = '';
    private string $inn = '';
    private string $name = '';
    private string $mobilePhone = '';
    private string $epayNumber = '';
    private string $regNumber = '';
    private string $oksmNumber = '';
    private string $status = '';

    /**
     * @param string $inn
     * @param string $name
     */
    public function __construct(string $name = '', string $inn = '')
    {
        $this->inn = $inn;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Client
     */
    public function setId(string $id): Client
    {
        $this->id = $id;
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
     * @return Client
     */
    public function setLegalForm(string $legalForm): Client
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
     * @return Client
     */
    public function setInn(string $inn): Client
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
     * @return Client
     */
    public function setName(string $name): Client
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
     * @return Client
     */
    public function setMobilePhone(string $mobilePhone): Client
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
     * @return Client
     */
    public function setEpayNumber(string $epayNumber): Client
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
     * @return Client
     */
    public function setRegNumber(string $regNumber): Client
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
     * Код страны регистрации юридического лица в соответствии с ОКСМ
     * @param string $oksmNumber
     * @return Client
     */
    public function setOksmNumber(string $oksmNumber): Client
    {
        $this->oksmNumber = $oksmNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Client
     */
    public function setStatus(string $status): Client
    {
        $this->status = $status;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId()
        ];
    }
}
