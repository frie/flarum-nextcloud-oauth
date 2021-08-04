# OAuth by FriendsOfFlarum - added Nextcloud

![License](https://img.shields.io/badge/license-MIT-blue.svg)


A [Flarum](http://flarum.org) extension. Allow users to log in with GitHub, Twitter, Facebook, Discord, GitLab, Google, LinkedIn - and now also Nextcloud!

This fork is not intended as a permanent replacement - hopefully Nextcloud some time will make its way to the code of FriendsOfFlarum

### Installation

Add the following lines to the composer.json file of your flarum installation:
```json
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/frie/flarum-oauth"
        }
    ],
```

The rest of the installation works as usual:

```sh
composer require fof/oauth:"dev-master"
```

### Updating

```sh
composer update fof/oauth
```


### Configuration

#### Configuration for Nextcloud

Nextcloud authentication is somewhat different from authentication against Github, Twitter etc.: we usually have community-owned Nextcloud instances, which we supplement by a commmunity-owned discussion forum. So it makes sense to enable enforcement of identical user names and nicknames (by configuration).

Therefore a switch was added *Copy user name from Nextcloud* (activate by entering **yes** in the input field). Without activating this switch the user has to define the user name on registration as usual - when activated the username is copied from Nextcloud. Since there is no Nextcloud icon yet in the awesome brand collection, the icon can be set by another input field.

#### Translation

A german translation was added to the original.

### Links

- Original code: [GitHub](https://github.com/FriendsOfFlarum/oauth)

### Nextcloud integration
  
For a close integration it makes sense to configure Flarum as an *external site* in Nextcloud. To make this work (running Flarum in an iframe of Nextcloud) the following setting in the config.php of Flarum file may be required:
  
```php
  'cookie' => [
    'samesite' => 'none', // `strict` / `none`, defaults to `lax`
  ], 
```
  
#### Issues

If you want to have Nextcloud as exclusive login option, you can disable the *regular* login by CSS configuration. The html code will still be there and be accessible to anybody. Same holds for registration - you cannot disallow registration, because the oauth extension makes use of this process. So to exclude "foreign" visitors, you cann make use of the doorkeeper extension and communicate an **Invite Code** to your community to keep control on who is allowed to join.
