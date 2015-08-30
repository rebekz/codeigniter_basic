# Codeigniter Basic  #

Introduction
========

Repository ini untuk bahan membangun Web application berbasis PHP

Aplikasi ini menggunakan framework Codeigniter 3.0.1 modular dilengkapi dengan:

* Modular Extensions - HMVC (https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc) 
* Template library (https://github.com/philsturgeon/codeigniter-template) 
* Assets library 
* Avenirer's matches cli (https://github.com/avenirer/codeigniter-matches-cli)

Aplikasi ini dibagi dua bagian: backend dan frontend yang bisa diakses:

* frontend: http://localhost/codeigniter_basic/public/
* backend: http://localhost/codeigniter_basic/public/admin/

Requirement:

1. PHP
2. MySQL
3. Codeigniter 3
4. Git

Installation
------------

**Step 1**

* install dari composer

```


composer create-project -s:dev rebekz/codeigniter_basic codeigniter
``` 

**Step 2**

* Edit file *index.php* di *public/* lalu rubah:

```

 $assign_to_config['base_url']	= *url_local_anda/public/*
``` 

* Edit file *index.php* di *public/admin/* lalu rubah:

```


$assign_to_config['base_url']	= *url_admin_local_anda/public/admin/*
```
 
Structure
----------

**Struktur aplikasi:**

        * public/admin
           *assets => untuk assets (js/css/img) backend/admin
        * public/assets => untuk assets (js/css/img) frontend
        * application 
            * back-modules => untuk module/halaman backend/admin
            * front-modules => untuk module/halaman frontend
            * views
               *admin
                  *view => untuk tampilan/template backend/admin
               *front
                  *view => untuk tampilan/template frontend
            * libraries => untuk memasukan library
            * models => untuk memasukan models

**Struktur module/halaman**

Setiap module/halaman dibuat dengan membuat folder yang didalamnya ada folder  **controllers, views**
Contoh module/halaman *main*. Struktur folder-nya:

        * main 
          * controllers => semua controllers untuk halaman main
          * views => semua view untuk halaman main

**Migration**

Untuk membuat schema database, bisa menggunakan fungsi migration di CI. untuk menambah/merubah schema database, buatlah suatu file di **applications/migrations/** folder dan dinamai dengan format YYYYMMDDHHIISS_<migration_name>.php, dimana YYYYMMDDHHIISS adalah timestamp (20121031100537) migration. untuk contoh file migration bisa lihat fie 20150829163413_create_users_table.php.php

anda juga bisa generate file migration dengan menjalankan command 

```


php public/index.php cli matches create:migration [<nama_migration>]
```

untuk jelasnya menggunakan migration bisa lihat tutorial : [http://zacharyflower.com/2013/08/12/getting-started-with-codeigniter-migrations/](http://zacharyflower.com/2013/08/12/getting-started-with-codeigniter-migrations/)

untuk migrate schema database ke versi baru dengan perintah


```


php public/index.php cli matches do:migration 
```

untuk mundur ke versi lama dengan perintah

```

php public/index.php cli matches undo:migration 
```


**Generate module**

anda bisa membuat module baru melalui perintah

```

php public/index.php cli matches create:module [<nama_file>] module:[<lokasi_module>].[<nama_module>]
```

contoh: 


```

php public/index.php cli matches create:module fitra module:back-modules.fitra
```

**Generate controller**

anda bisa generate controller baru melalui perintah

```

php public/index.php cli matches create:controller:module [<nama_file>] module:[<lokasi_module>].[<nama_module>]
```

contoh: 


```

php public/index.php cli matches create:controller:module fitra module:back-modules.fitra
```

**Generate view**

anda bisa generate view baru melalui perintah

```

php public/index.php cli matches create:view:module [<nama_file>] module:[<lokasi_module>].[<nama_module>]
```

contoh: 


```

php public/index.php cli matches create:view:module fitra module:back-modules.fitra
```

**Generate model**

anda bisa generate model baru melalui perintah

```

php public/index.php cli matches create:model [<nama_file>] 
```

contoh: 


```

php public/index.php cli matches create:module fitra
```

*perintah lainnya bisa diliat di: https://github.com/avenirer/codeigniter-matches-cli*


Resources
-------

Website template : http://startbootstrap.com/template-overviews/sb-admin-2/

Dokumentasi Code Igniter: http://www.codeigniter.com/userguide3/index.html

Logs
------
v.0.1 = initial upload

v.0.2 = nambah migration dan generate module
