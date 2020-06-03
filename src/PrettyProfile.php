<?php

namespace EscCompany\ViewTransformer;

class PrettyProfile
{
    /**
     * 이미지 서버 path
     */
    const AVATAR_URL_PREFIX = 'https://m.holapet.com/images/avatars/';
    const DEFAULT_BACKGROUND_IMAGE = 'https://m.holapet.com/images/pro_back.png';

    /**
     * 닉네임 prefix 리스트
     */
    private static $nicknamePrefixes = ['평범한', '섹시한', '행복한', '즐거운', '귀여운', '어여쁜', '우아한', '화려한', '완벽한', '빛나는', '날씬한', '뚱뚱한', '명랑한', '쾌활한', '용감한', '성실한', '정직한', '현명한', '상냥한', '무서운', '피곤한', '배고픈', '심심한', '튼튼한', '눈부신', '당당한', '위대한', '잘생긴', '냉정한', '똑똑한', '예리한', '차가운', '놀라운', '게으른', '거대한', '쪼그만', '재빠른', '고요한', '활발한', '달달한'];

    /**
     * 닉네임 리스트
     */
    private static $nicknames = ['네벨룽', '노르웨이숲', '데본렉스', '드래곤리', '라가머핀', '라팜', '래그돌', '러시안블루', '맹크스', '메인쿤', '뱅갈', '버먼', '버미즈', '봄베이', '샴', '셀커크렉스', '소말리', '스코티시폴드', '스핑크스', '싱가푸라', '아메리칸컬', '아비시니안', '에게안고양이', '엑조틱고양이', '오리엔탈고양이', '오시캣', '이집션마우', '재패니즈밥테일', '코니시렉스', '코렛', '코리안쇼트헤어', '터키시반', '터키시앙고라', '페르시안', '피터볼드', '하바나브라운', '골든리트리버', '그레이하운드', '그레이트데인', '그레이트피레니즈', '닥스훈트', '달마시안', '도베르만', '도베르만핀셔', '러셀테리어', '렛테리어', '로트바일러', '마스티프', '말리노이즈', '말티즈', '바셋하운드', '벨지안쉽독', '보더콜리', '복서', '불테리어', '불독', '불마스티프', '브뤼셀그리폰', '블루레이시', '비글', '비숑프리제', '사모예드', '샤페이', '세인트버나드', '셔틀랜드쉽독', '슈나우저', '스코틀랜드테리어', '스키퍼키', '스프링거스파니엘', '스피츠', '시바견', '시베리안허스키', '시추', '아키타', '아프간하운드', '알래스칸말라뮤트', '에어데일테리어', '요크셔테리어', '웨일스쉽독', '웰시코기', '저먼셰퍼드', '제페니스친', '진돗개', '차우차우', '치와와', '카네코르소', '카타훌라레오파드', '캐롤리나독', '캐틀독', '켈피', '쿤하운드', '쿨리', '테뷰런', '토이티컵푸들', '파라오하운드', '파슨러셀테리어', '파피용', '퍼그', '포메라니안', '푸들', '프렌치불독', '휘핏'];

    /**
     * 프로필 이미지 코드, 폴더로 사용됨.
     */
    private static $profileImageCode = ['2/1', '2/2', '2/3', '2/5', '2/6', '2/7', '2/8', '2/9', '2/10', '2/11', '2/12', '2/13', '2/14', '2/15', '2/17', '2/18', '2/19', '2/20', '2/21', '2/22', '2/23', '2/24', '2/25', '2/26', '2/27', '2/29', '2/30', '2/31', '2/33', '2/34', '2/35', '2/36', '2/37', '2/38', '2/39', '2/40', '1/4', '1/5', '1/6', '1/7', '1/8', '1/9', '1/10', '1/11', '1/12', '1/13', '1/14', '1/15', '1/16', '1/17', '1/18', '1/20', '1/21', '1/22', '1/24', '1/25', '1/26', '1/27', '1/28', '1/29', '1/30', '1/31', '1/32', '1/33', '1/34', '1/35', '1/36', '1/37', '1/38', '1/39', '1/40', '1/41', '1/42', '1/45', '1/46', '1/47', '1/48', '1/52', '1/54', '1/55', '1/56', '1/57', '1/58', '1/59', '1/61', '1/62', '1/63', '1/64', '1/65', '1/66', '1/67', '1/68', '1/69', '1/70', '1/71', '1/72', '1/73', '1/74', '1/76', '1/77', '1/78', '1/79'];

    /**
     * 디폴트 이미지로 처리할 이미지 이름
     */
    private static $defaultProfileImageFilenames = ['profile_default.png', 'photo_people.png'];

    /**
     * https 강제 변환 설정
     */
    private static $forceHttps = true;

    /**
     * 닉네임 prefix의 갯수를 구함
     *
     * @return int
     */
    private static function getNicknamePrefixCount()
    {
        return count(self::$nicknamePrefixes);
    }

    /**
     * 닉네임 갯수를 구함
     *
     * @return int
     */
    private static function getNicknameCount()
    {
        return count(self::$nicknames);
    }

    /**
     * 이미지코드 갯수를 구함
     *
     * @return integer
     */
    private static function getProfileImageCodeCount()
    {
        return count(self::$profileImageCode);
    }

    /**
     * 닉네임이 없을 떄 추천 닉네임을 구함
     *
     * @param integer $user_id
     * @param string $value
     * @return string
     */
    public static function nickname(int $user_id, $value = null)
    {
        if (empty($value) || $value == '-') {
            $prefix_index = $user_id % self::getNicknamePrefixCount();
            $nickname_index = $user_id % self::getNicknameCount();

            return self::$nicknamePrefixes[$prefix_index] . ' ' . self::$nicknames[$nickname_index];
        }

        return $value;
    }

    /**
     * 기본 프로필이미지를 구함
     *
     * @param integer $user_id
     * @param string $profile_img
     * @return string
     */
    public static function profileImage(int $user_id, $profile_img = null)
    {
        if (
            empty($profile_img) || in_array($profile_img, self::$defaultProfileImageFilenames)
        ) {
            $index = $user_id % self::getProfileImageCodeCount();
            return self::AVATAR_URL_PREFIX . self::$profileImageCode[$index] . '.png?crop=20px,20px,160px,160px';
        }

        return self::$forceHttps ? preg_replace('/^http:/', 'https:', $profile_img) : $profile_img;
    }

    /**
     * 기본 배경이미지를 구함
     *
     * @param string $background_image
     * @return string
     */
    public static function backgroundImage($background_image = null)
    {
        if (empty($background_image)) {
            return self::DEFAULT_BACKGROUND_IMAGE;
        }

        return $background_image;
    }
}
