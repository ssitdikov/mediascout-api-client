<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object\Dictionary;

class Dictionary implements \JsonSerializable
{
    private string $id = '';

    private string $code = '';
    private string $parentCode = '';
    private int $level   = 0;
    private string $name = '';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Dictionary
     */
    public function setId(string $id): Dictionary
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Dictionary
     */
    public function setCode(string $code): Dictionary
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentCode(): string
    {
        return $this->parentCode;
    }

    /**
     * @param string $parentCode
     * @return Dictionary
     */
    public function setParentCode(string $parentCode): Dictionary
    {
        $this->parentCode = $parentCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return Dictionary
     */
    public function setLevel(int $level): Dictionary
    {
        $this->level = $level;
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
     * @return Dictionary
     */
    public function setName(string $name): Dictionary
    {
        $this->name = $name;
        return $this;
    }



    public function jsonSerialize()
    {
        return [
            'id' => $this->getId()
        ];
    }
}
