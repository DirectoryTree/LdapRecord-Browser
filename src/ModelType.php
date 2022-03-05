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
    protected static $types = [
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
     * Register a model type bound to an object class.
     *
     * @param string $objectClass
     * @param string $type
     * 
     * @return void
     */
    public static function register($objectClass, $type)
    {
        static::$types[$objectClass] = $type;
    }

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

        foreach ($classes as $objectClass) {
            if (static::exists($objectClass)) {
                return static::get($objectClass);
            }
        }

        return static::UNKNOWN;
    }

    /**
     * Get the all or a specific type by object class.
     *
     * @return array|string|null
     */
    public static function get($objectClass = null)
    {
        if ($objectClass) {
            return static::$types[$objectClass] ?? null;
        }

        return static::$types;
    }

    /**
     * Determine if a model type exists with the given object class.
     *
     * @param string $objectClass
     * 
     * @return bool
     */
    public static function exists($objectClass)
    {
        return array_key_exists($objectClass, static::$types);
    } 
}
