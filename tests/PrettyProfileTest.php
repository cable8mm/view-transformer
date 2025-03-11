<?php

namespace Cable8mm\ViewTransformer\Tests;

use Cable8mm\ViewTransformer\PrettyProfile;
use PHPUnit\Framework\TestCase;

class PrettyProfileTest extends TestCase
{
    public function test_it_gets_expect_nickname(): void
    {
        $profileNickname = PrettyProfile::getInstance()->nickname(1);

        $this->assertEquals('평범한 네벨룽', $profileNickname);

        $profileNickname = PrettyProfile::getInstance()->nickname(2);

        $this->assertEquals('섹시한 노르웨이숲', $profileNickname);
    }

    public function test_it_gets_expected_cat_profile_image(): void
    {
        $profileImage = PrettyProfile::getInstance()->cat(1);

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/cat/1.png', $profileImage);

        $profileImage = PrettyProfile::getInstance()->cat(3823);

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/cat/10.png', $profileImage);
    }

    public function test_it_gets_expected_dog_profile_image(): void
    {
        $profileImage = PrettyProfile::getInstance()->dog(1);

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/dog/1.png', $profileImage);

        $profileImage = PrettyProfile::getInstance()->dog(827342);

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/dog/62.png', $profileImage);
    }

    public function test_it_gets_all_of_cats(): void
    {
        $cats = PrettyProfile::getInstance()->cats();

        $this->assertEquals(41, count($cats));
    }

    public function test_it_gets_all_of_dogs(): void
    {
        $cats = PrettyProfile::getInstance()->dogs();

        $this->assertEquals(80, count($cats));
    }

    public function test_it_gets_cat_and_dog_for_laravel(): void
    {
        $dog = PrettyProfile::profileImage(4123, animal: 'dog');

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/dog/43.png', $dog);

        $cat = PrettyProfile::profileImage(1, animal: 'cat');

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/cat/1.png', $cat);
    }

    public function test_it_gets_background_image(): void
    {
        $bg = PrettyProfile::backgroundImage();

        $this->assertEquals('https://cabinet-pets.palgle.com/bg/bg-1.png', $bg);
    }

    public function test_it_gets_my_background_image(): void
    {
        $bg = PrettyProfile::backgroundImage('https://cabinet-pets.palgle.com/avatars/cat/1.png');

        $this->assertEquals('https://cabinet-pets.palgle.com/avatars/cat/1.png', $bg);
    }
}
