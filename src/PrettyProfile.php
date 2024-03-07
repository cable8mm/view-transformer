<?php

namespace EscCompany\ViewTransformer;

use EscCompany\ViewTransformer\Traits\Singleton;
use InvalidArgumentException;

class PrettyProfile
{
    use Singleton;

    const CAT_AVATAR_URL_PREFIX = 'https://cabinet.companimal.net/avatars/cat/';

    /**
     * @see https://github.com/companimal/cabinet/tree/main/avatars/cat
     */
    const CAT_AVATAR_COUNT = 41;

    const DOG_AVATAR_URL_PREFIX = 'https://cabinet.companimal.net/avatars/dog/';

    /**
     * @see https://github.com/companimal/cabinet/tree/main/avatars/dog
     */
    const DOG_AVATAR_COUNT = 80;

    private array $nicknamePrefixs;

    private array $nicknames;

    /**
     * The value can be 'large', 'medium', 'small'. Null value means a original size.
     */
    private ?string $size;

    private static array $sizes = ['large', 'medium', 'small'];

    private static array $animals = ['dog', 'cat'];

    private function __construct()
    {
        $this->nicknamePrefixs = require __DIR__.'/Data/NicknamePrefix.php';

        $this->nicknames = require __DIR__.'/Data/Nickname.php';
    }

    public function nickname(int $id): string
    {
        if ($id < 1) {
            throw new InvalidArgumentException('The value must be over 0, so a value of '.$id.' is not valid.');
        }

        $prefix = ($id - 1) % count($this->nicknamePrefixs);

        $nickname = ($id - 1) % count($this->nicknames);

        return $this->nicknamePrefixs[$prefix].' '.$this->nicknames[$nickname];
    }

    private function image(string $animal, int $id, ?string $size = null): string
    {
        if ($id < 1) {
            throw new InvalidArgumentException('The value must be over 0, so a value of '.$id.' is not valid.');
        }

        if (! is_null($size) && ! in_array($size, self::$sizes)) {
            throw new InvalidArgumentException('The value must be "large" or "medium" or "small", so a value of "'.$size.'" is not valid.');
        }

        $key = match ($animal) {
            'dog' => ($id - 1) % self::DOG_AVATAR_COUNT + 1,
            'cat' => ($id - 1) % self::CAT_AVATAR_COUNT + 1,
            default => throw new InvalidArgumentException('The value must dog or cat, so a value of '.$animal.' is not valid.')
        };

        $path = is_null($size) ? '' : $size.'/';

        return match ($animal) {
            'dog' => self::DOG_AVATAR_URL_PREFIX.$path.$key.'.png',
            'cat' => self::CAT_AVATAR_URL_PREFIX.$path.$key.'.png',
        };
    }

    public function cat(int $id, ?string $size = null): string
    {
        return $this->image('cat', $id, $size);
    }

    public function cats(?string $size = null): array
    {
        return array_map(
            fn ($item) => $this->cat($item, $size),
            range(1, self::CAT_AVATAR_COUNT)
        );
    }

    public function dog(int $id, ?string $size = null): string
    {
        return $this->image('dog', $id, $size);
    }

    public function dogs(?string $size = null): array
    {
        return array_map(
            fn ($item) => $this->dog($item, $size),
            range(1, self::DOG_AVATAR_COUNT)
        );
    }

    public static function profileImage(int $id, ?string $image = null, $animal = 'dog'): string
    {
        if (! in_array($animal, self::$animals)) {
            throw new InvalidArgumentException('The value must be dog or cat. '.$animal.' can not valid.');
        }

        if (! empty($image)) {
            return $image;
        }

        return $animal === 'dog' ?
            self::getInstance()->dog($id) :
            self::getInstance()->cat($id);
    }
}
