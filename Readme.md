# Init

## new project 

- clone project
`git clone --depth 1 https://github.com/vicocotea/wordpress-starter.git && cd wordpress-starter && rm -rf .git && git init`
- create DB
- update env files : wp-config.env.php (paths), wp-config.ENV-NAME.php (database)
- create config/wp-config.local.php
`define('DB_PASSWORD', 'PASSWORD');`
- clone theme into app/themes/
`git clone --depth 1 https://github.com/vicocotea/starter-theme.git && cd starter-theme && rm -rf .git && git init`
- update .gitignore

## install

- install composer packages
`composer install`
