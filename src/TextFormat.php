<?php

namespace Src;

/**
 * Class TextFormat
 *
 * The Base Decorator Class.
 * It Stores the wrapped component and delegates the format dirty work to the wrapped object
 */

class TextFormat implements InputFormatable
{
    protected InputFormatable $inputFormat;

    public function __construct(InputFormatable $inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}