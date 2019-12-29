<?php

declare(strict_types=1);

namespace webignition\QuotedStringValueExtractor;

class QuotedStringValueExtractor
{
    public static function createExtractor(): QuotedStringValueExtractor
    {
        return new QuotedStringValueExtractor();
    }

    public function getValue(string $quotedString): string
    {
        $quotedString = trim($quotedString);
        if ('' === $quotedString) {
            return '';
        }

        $value = $quotedString;

        if ('"' === $value[0]) {
            $value = mb_substr($value, 1);
        }

        if ('"' === $value[-1]) {
            $value = mb_substr($value, 0, -1);
        }

        return str_replace('\\"', '"', $value);
    }
}
