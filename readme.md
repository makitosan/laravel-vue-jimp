# IMPORTANT NOTICE
This project has a kind of security vulnerability which is reported on laravel-mix project. 
See the detail at the following issue.

https://github.com/JeffreyWay/laravel-mix/issues/1633

This vulnerability is caused by 'hoek' ver 2.16.3 used by 'laravel-mix'.
'hoek' is placed in a deep dependency tree of 'laravel-mix'.
I'm not sure when this issue will be closed.

As 'laravel-mix' is utilized in the development environment not the production environment.
So it will not cause a server side security vulnerability.

# ABOUT
laravel-vue-jimp is to prove the basic idea for a very simple online image editor by Laravel + Vue + Jimp.
This project has only three features.

1. Load image (Jimp)
1. Composite images (Jimp)
1. Upload an image and store to the server (Laravel)

# IMPORTANT

## PHP VERSION

```composer.json
    "php": ">=7.2.0",
```

# REFERENCE
## UPLOAD CANVAS IMAGE 
https://stackoverflow.com/questions/13198131/how-to-save-an-html5-canvas-as-an-image-on-a-server

# PROJECTS
## POC-JIMP
Vue Jimp integration has been proved the following project which is literally NOT integrated each other.
Jimp is loaded as global object not as a Vue component nor similar. Sad...

https://github.com/makitosan/poc-jimp
