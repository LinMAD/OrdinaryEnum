<?php

namespace EnumType;

use EnumType\Exceptions\InvalidEnumTypeException;
use ReflectionClass;

/**
 * Class Enum represents implementation of enumerated type in PHP
 */
abstract class Enum
{
    /**
     * The default value of enum type in data class
     *
     * @var mixed $__default
     */
    public const __default = null;

    /**
     * A Value of enumed class type
     *
     * @var mixed
     */
    protected $value;

    /**
     * Enum constructor sets given value or simply defines default value
     *
     * @param mixed $value
     *
     * @throws InvalidEnumTypeException
     */
    public function __construct($value = null)
    {
        if ($value === null) {
            $value = $this::__default;
        }

        $this->setValue($value);
    }

    /**
     * Return value of this enum
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Validates if the type given is part of this enum class
     *
     * @param string $checkValue
     *
     * @return bool
     */
    public function isValidEnumValue($checkValue): bool
    {
        $reflector = new ReflectionClass(\get_class($this));
        foreach ($reflector->getConstants() as $validValue) {
            if ($validValue === $checkValue) {
                return true;
            }
        }
        return false;
    }

    /**
     * Cast enum value to string automatically
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * Define the enum value
     *
     * @param string $value
     *
     * @throws InvalidEnumTypeException
     */
    private function setValue($value): void
    {
        if ($this->isValidEnumValue($value)) {
            $this->value = $value;

            return;
        }

        throw new InvalidEnumTypeException(
            "Value ('$value')" . ' is not part of the enum data type in ' . static::class
        );
    }
}
