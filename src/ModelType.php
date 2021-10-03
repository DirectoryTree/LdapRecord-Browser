<?php

namespace LdapRecord\Browser;

use LdapRecord\Models\Model;

class ModelType
{
    const USER = 'user';
    const GROUP = 'group';
    const DOMAIN = 'domain';
    const COMPUTER = 'computer';
    const CONTAINER = 'container';
    const UNKNOWN = 'unknown';
    const DEFAULT = 'default';

    /**
     * The objectclass type map.
     *
     * @var array
     */
    protected static $map = [
        'user'                  => self::USER,
        'inetorgperson'         => self::USER,
        'group'                 => self::GROUP,
        'groupofnames'          => self::GROUP,
        'groupofentries'        => self::GROUP,
        'groupofuniquenames'    => self::GROUP,
        'domain'                => self::DOMAIN,
        'computer'              => self::COMPUTER,
        'locality'              => self::CONTAINER,
        'container'             => self::CONTAINER,
        'lostandfound'          => self::CONTAINER,
        'organizationalunit'    => self::CONTAINER,
        'msds-quotacontainer'   => self::CONTAINER,
    ];

    /**
     * Attempt resolving the LDAP models type.
     *
     * @return string|null
     */
    public static function resolve(Model $model)
    {
        $classes = array_reverse(
            array_map('strtolower', $model->getObjectClasses())
        );

        foreach ($classes as $class) {
            if (array_key_exists($class, static::$map)) {
                return static::$map[$class];
            }
        }
    }
}
