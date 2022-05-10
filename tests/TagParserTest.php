<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    protected TagParser $parser;

    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $result = $this->parser ->parse($input);

        $this->assertSame($expected, $result);
    }

    public function tagsProvider()
    {
        return [
            'single' => ['personal', ['personal']],
            'commas' => ['personal, money', ['personal', 'money']],
            'pipes' => ['personal | money', ['personal', 'money']],
            'no_spaces' => ['personal,money',['personal', 'money' ]],
            'no_spaces_pipes' => ['personal|money',['personal', 'money'] ],
            'exclamation'  => ['personal!money',['personal', 'money'] ],
        ];
    }
}
