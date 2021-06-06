<div>
    @switch($type)
    @case('user')
    <x-ldap::icons.user />
    @break
    @case('group')
    <x-ldap::icons.group />
    @break
    @case('container')
    <x-ldap::icons.container />
    @break
    @default
    <x-ldap::icons.unknown />
    @endswitch
</div>