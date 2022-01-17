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
        $value = trim($quotedString);

        if (str_starts_with($value, '"')) {
            $value = mb_substr($value, 1);
        }

        if (str_ends_with($value, '"')) {
            $value = mb_substr($value, 0, -1);
        }

        return str_replace('\\"', '"', $value);
    }
}
