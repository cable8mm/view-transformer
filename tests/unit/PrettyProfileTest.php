<?php

declare(strict_types=1);

use EscCompany\ViewTransformer\PrettyProfile;
use PHPUnit\Framework\TestCase;

class PrettyProfileTest extends TestCase
{
    public function testExpectProfilename()
    {
        $profileNickname = PrettyProfile::nickname(0);

        $this->assertEquals('평범한 네벨룽', $profileNickname);

        $profileNickname = PrettyProfile::nickname(1);

        $this->assertEquals('섹시한 노르웨이숲', $profileNickname);

        $profileNickname = PrettyProfile::nickname(2);

        $this->assertEquals('행복한 데본렉스', $profileNickname);
    }

    public function testExceptProfileImage()
    {
        $profileImage = PrettyProfile::profileImage(0);

        $this->assertEquals('https://m.holapet.com/images/avatars/2/1.png?crop=20px,20px,160px,160px', $profileImage);
    }
}
