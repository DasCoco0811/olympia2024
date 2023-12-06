# Wichtiges für Schule
## Commands

### Links:
Grundlagen für den Anfang auf:\
-> Admin anzeigen, CRUD erstellen, Login, Auth und Passwort Hashing\
https://scqr.net/en/blog/2022/11/11/symfony-6-and-easyadmin-4-admin-panel-for-user-management-system/

Alles zum Easy Admin:
https://symfony.com/bundles/EasyAdminBundle/current/index.html

### Grundlagen:

Install project:
```console 
symfony new --webapp olympia2024
```

Install Easy-Admin:
```console
symfony composer req "admin:^4"
```

Install encore (mit yarn/npm):
```console
composer require symfony/webpack-encore-bundle
yarn install
```


### Allgemeines:

Start server:
```console
symfony serve -d
```

Watcher für dev-environment (mit yarn/npm):
```console
yarn encore dev --watch
```

Update DB:
```console
bin/console make:migration
bin/console doctrine:migrations:migrate
```

### Encore:
watcher für dauerhaftes kompilieren:
```console
yarn watch
```

Dev Server:
```console
yarn dev-server
```

Compile assets once:
```console
yarn dev
```

Build production:
```console
yarn build
```