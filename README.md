# *Aqto: Adaptive, quality technology orchestration.*
<!-- Lets do an image here for the images/aqto-logo-western.png -->
![Aqto Logo](images/aqto-logo-western.png)

Aqto is an opinionated stack of backend and frontend frameworks, that can be used interchangeably, aiming to provide maximum flexibility, longevity, and maintainability across a variety of project types. It is a Drupal 10 based project that is designed to be a starting point for a variety of web projects. It is designed to be a platform for a variety of web products, providing comprehensive examples for API integrations, Commerce, and other common use cases.

## Preqrequisites
- Docksal - https://docksal.io
- Composer - https://getcomposer.org/download

## Quickstart
```bash
composer create-project twfahey1/aqto_project -s dev my-aqto-project 
cd my-aqto-project
composer install
fin up && fin init-site && fin drush si -y
# Optional: enable some default modules and login as admin
fin drush en -y aqto_defaults -y && fin uli

# One shot command - just replace [site_name] in the two places below:
composer create-project twfahey1/aqto_project -s dev [site_name] && cd [site_name] && composer install && fin up && fin init-site && fin drush si -y && fin drush en -y aqto_defaults -y && fin uli
```


## Goals
Aqto aims to be living documentation as an ideal starting template for a variety of web products and encourage best practices for always facilitating customizability, maintability and scalability. It aims to be an easy to use platform for a wide range of apps, providing comprehensive examples for API integrations, Commerce, and other common use cases.

## Features
- Composer driven with an upstream setup to facilitate platform models via the [Aqto Upstream](https://github.com/twfahey1/aqto_upstream.git)
- Geared for [Docksal](https://docksal.io)
- Uses [Drupal](https://www.drupal.org) under the hood
- Paragraphs, Layout Builder, and Media Library are the primary content creation tools.
- TailwindCSS and AlpineJS are leveraged for the front end.

## Hosting an Aqto project with Pantheon
This project serves as more of a general purpose template. If you are looking to host an Aqto project with Pantheon, you should be able to simply require the [Aqto Upstream](https://github.com/twfahey1/aqto_upstream.git) in your project. Here are the steps to do so:
- Create a Drupal 10 site on Pantheon that is Composer managed.
- Run a `composer require twfahey1/aqto_upstream` in the root of the project.
- Enable the `aqto_defaults` or whatever pieces of Aqto are desired for the project.