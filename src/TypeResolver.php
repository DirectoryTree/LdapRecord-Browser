<?php

namespace LdapRecord\Browser;

class TypeResolver
{
    const USER = 'user';
    const GROUP = 'group';
    const DOMAIN = 'domain';
    const COMPUTER = 'computer';
    const CONTAINER = 'container';

    /**
     * The LDAP entry's object classes.
     *
     * @var array
     */
    protected $classes = [];

    /**
     * The objectclass type map.
     *
     * @var array
     */
    protected $map = [
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
     * Constructor.
     *
     * @param array $classes
     */
    public function __construct(array $classes = [])
    {
        $this->classes = array_reverse(
            array_map('strtolower', $classes)
        );
    }

    /**
     * Determine the LDAP objects type.
     *
     * @return string|null
     */
    public function get()
    {
        foreach ($this->classes as $class) {
            if (array_key_exists($class, $this->map)) {
                return $this->map[$class];
            }
        }
    }
}
