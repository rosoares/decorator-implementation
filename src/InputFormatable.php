<?php

namespace Src;

interface InputFormatable
{
    public function formatText(string $text): string;
}