<?php

declare(strict_types=1);

use EscCompany\ViewTransformer\WordBinder;
use PHPUnit\Framework\TestCase;

class WordBinderTest extends TestCase
{
    public function testExpectCaptionView()
    {
        $view = WordBinder::view('[caption width=80]<video src="https://test.com/video/2343jj234">[/caption]');

        $this->assertEquals('<video src="https://test.com/video/2343jj234">', $view);
    }

    public function testExpectEmbedView()
    {
        $view = WordBinder::view('[embed]https://www.youtube.com/watch?v=XsJ9GFGkEOk[/embed]');

        $this->assertEquals('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/watch" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', $view);
    }
}
