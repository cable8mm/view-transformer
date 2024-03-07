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

    public function cat(int $id): string
    {
        if ($id < 1) {
            throw new InvalidArgumentException('The value must be over 0, so a value of '.$id.' is not valid.');
        }

        $cat = ($id - 1) % self::CAT_AVATAR_COUNT + 1;

        return self::CAT_AVATAR_URL_PREFIX.$cat.'.png';
    }

    public function cats(): array
    {
        return array_map(
            fn ($item) => self::CAT_AVATAR_URL_PREFIX.$item.'.png',
            range(1, self::CAT_AVATAR_COUNT)
        );
    }

    public function dog(int $id): string
    {
        if ($id < 1) {
            throw new InvalidArgumentException('The value must be over 0, so a value of '.$id.' is not valid.');
        }

        $dog = ($id - 1) % self::DOG_AVATAR_COUNT + 1;

        return self::DOG_AVATAR_URL_PREFIX.$dog.'.png';
    }

    public function dogs(): array
    {
        return array_map(
            fn ($item) => self::DOG_AVATAR_URL_PREFIX.$item.'.png',
            range(1, self::DOG_AVATAR_COUNT)
        );
    }
}
