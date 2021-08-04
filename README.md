# OAuth for Nextcloud

## A supplement to the OAuth extenstion fof/oauth by FriendsOfFlarum

![License](https://img.shields.io/badge/license-MIT-blue.svg)


A [Flarum](http://flarum.org) extension supplementing `fof/oauth` (OAUth for Flarum by FriendsOfFlarum) with a lean implementation for community owned Nextcloud instances.

### Installation

```sh
composer require frie/flarum-nextcloud-oauth
```

### Updating

```sh
composer update frie/flarum-nextcloud-oauth
```


### Configuration

Before activating this extension, `fof/oauth` also needs to be activated.

The Nextcloud provider is configured in the scope of `fof/oauth`

#### Configuration for Nextcloud

Nextcloud authentication is somewhat different from authentication against Github, Twitter etc.: we usually have community-owned Nextcloud instances, which we supplement by a commmunity-owned discussion forum. So it makes sense to enable enforcement of identical user names and nicknames (by configuration).

Therefore a switch was added *Copy user name from Nextcloud* (activate by entering **yes** in the input field). Without activating this switch the user has to define the user name on registration as usual - when activated the username is copied from Nextcloud. Since there is no Nextcloud icon yet in the awesome brand collection, the icon can be set by another input field.

#### Translation

A german translation was added to the original.

### Links

- Base extension: [GitHub](https://github.com/FriendsOfFlarum/oauth)

### Nextcloud integration
  
For a close integration it makes sense to configure Flarum as an *external site* in Nextcloud. To make this work (running Flarum in an iframe of Nextcloud) the following setting in the config.php of Flarum file may be required:
  
```php
  'cookie' => [
    'samesite' => 'none', // `strict` / `none`, defaults to `lax`
  ], 
```
  
#### Issues

If you want to have Nextcloud as exclusive login option, you can disable the *regular* login by CSS configuration. The html code will still be there and be accessible to anybody. Same holds for registration - you cannot disallow registration, because the oauth extension makes use of this process. So to exclude "foreign" visitors, you cann make use of the doorkeeper extension and communicate an **Invite Code** to your community to keep control on who is allowed to join.
