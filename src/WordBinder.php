<?php

namespace EscCompany\ViewTransformer;

class WordBinder
{
    /**
     *  The main content of WordPress is publishing (e.g., deleting tags, changing video tags to embedding tags, etc.)
     */
    public static function view(string $content): string
    {
        // If there is a caption block in the code copied from WordPress, only the image is used.
        $content = preg_replace("/\[caption.+(<[^>]+>).+caption]/", '$1', $content);
        $content = preg_replace(
            "/\[embed\].+\/([^\?]+)\??.*\[\/embed\]/",
            '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/$1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            $content
        );

        return str_replace('<p>&nbsp;</p>', '', $content);
    }

    /**
     * Insert banner code in nth phrases.
     */
    public static function addBanner(string $content, string $bannerHtml, int $nthPTag = 0): string
    {
        if ($nthPTag == 0) {
            return $bannerHtml.$content;
        }

        $counter = 1;

        return preg_replace_callback('/<\/p>/', function ($m) use (&$counter, $bannerHtml, $nthPTag) {
            if ($counter++ == $nthPTag) {
                return '</p>'.$bannerHtml;
            }

            return $m[0];
        }, $content);
    }
}
