<?php

namespace Src;

/**
 * Class TextInput
 *
 * Concrete component of Decorator, contains the text without filtering or formatting
 */

class TextInput implements InputFormatable
{

    public function formatText(string $text): string
    {
        return $text;
    }
}