<?php

use PHPUnit\Framework\TestCase;

class JpegToolsTest extends TestCase
{
    public function testRecompress()
    {
        $jpegUtil = new \JpegTools\JpegTools();

        $in = __DIR__ . '/fixture/in.jpg';
        $out = __DIR__ . '/fixture/out.jpg';
        $result = $jpegUtil->recompress($in, $out);
        print_r($result);
    }
}