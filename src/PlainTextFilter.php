<?php

namespace Src;

/**
 * Class PlainTextFilter
 * Its a concrete decorator implementation that will format a plain text
 */

class PlainTextFilter extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }
}