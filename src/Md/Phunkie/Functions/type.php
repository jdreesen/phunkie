<?php

namespace Md\Phunkie\Functions\type;

use Md\Phunkie\Types\ImmInteger;
use Md\Phunkie\Types\ImmString;

const promote = "Md\\Phunkie\\Functions\\type\\promote";
function promote($value)
{
    switch (gettype($value)) {
        case "int":
        case "integer":
            return new ImmInteger($value);
        case "string": return new ImmString($value);
        default: return $value;
    }
}

const normaliseType = "Md\\Phunkie\\Functions\\type\\normaliseType";
function normaliseType($type)
{
    $scalars = [
        "int" => "Int",
        "string" => "String",
        "bool" => "Boolean",
        "callable" => "Callable",
        "null" => "Null",
        "double" => "Double",
        "float" => "Float",
        "resource" => "Resource"
    ];

    return is_string($type) && isset($scalars[$type]) ? $scalars[$type] : $type;
}