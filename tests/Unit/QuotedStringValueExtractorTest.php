<?php

declare(strict_types=1);

namespace webignition\QuotedStringValueExtractor\Tests\Unit;

use webignition\QuotedStringValueExtractor\QuotedStringValueExtractor;

class QuotedStringValueExtractorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider getValueDataProvider
     */
    public function testGetValue(string $quotedString, string $expectedValue): void
    {
        $extractor = QuotedStringValueExtractor::createExtractor();

        $this->assertSame($extractor->getValue($quotedString), $expectedValue);
    }

    /**
     * @return array<mixed>
     */
    public function getValueDataProvider(): array
    {
        return [
            'empty' => [
                'quotedString' => '',
                'expectedValue' => '',
            ],
            'whitespace' => [
                'quotedString' => '   ',
                'expectedValue' => '',
            ],
            'quoted empty' => [
                'quotedString' => '""',
                'expectedValue' => '',
            ],
            'quoted non-empty' => [
                'quotedString' => '"non-empty"',
                'expectedValue' => 'non-empty',
            ],
            'quoted non-empty with escaped quotes' => [
                'quotedString' => '"non-empty \"with escaped quotes\""',
                'expectedValue' => 'non-empty "with escaped quotes"',
            ],
        ];
    }
}
