<?php

namespace EscCompany\ViewTransformer;

class WordBinder
{
    /**
     *  워드프레스의 본문을 퍼블리싱(예. 태그 삭제, 동영상 태그를 임베딩 태그로 변경 등...).
     *
     * @param string $content
     * @return string
     */
    public static function view($content)
    {
        // 워드프레스에서 복사한 코드에 caption 블록이 있으면 이미지만 꺼내쓴다
        $content = preg_replace("/\[caption.+(<[^>]+>).+caption]/", '$1', $content);
        $content = preg_replace(
            "/\[embed\].+\/([^\?]+)\??.*\[\/embed\]/",
            '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/$1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            $content
        );

        return str_replace('<p>&nbsp;</p>', '', $content);
    }

    public static function addBanner($content, $bannerHtml, $nthPTag = 0)
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
