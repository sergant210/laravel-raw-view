<?php

namespace RawView\Tests;

use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class RawViewTest extends TestCase
{
    public function testGetRenderedString()
    {
        $output = view_raw('<div>Hello, {{ $name }}!</div>', ['name' => 'John'])->render();
        Assert::same($output, '<div>Hello, John!</div>');
    }
}
