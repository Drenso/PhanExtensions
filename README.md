# PhanExtensions
This project contains several extensions (stubs/plugins) to be used with Phan for static PHP analysis


## Plugins

We currently have the following plugins available:

- Doctrine (@ORM)
- JMS (@JMS, @Secure)
- Symfony (@Assert, @Route, @Template)
- Vich (@Vich)


You can enable a plugins by adding it to your Phan configuration:

```php
return [
  'plugins'                         => [
    'vendor/drenso/phan-extensions/Plugin/Annotation/SymfonyAnnotationPlugin.php'
  ],
];
```

# Stubs

We currently have stubs for the following packages:

- curl
- intl
- pdo
- radius
- sockets   

You can enable a stub by adding it to your Phan configuration. Note that you also want to disable analysis on the 
specific folder. You probably already added the vendor directory to your configuration (in both lists), in which case
you can skip this setup.

```php
return [
  'directory_list'                  => [
    'vendor/drenso/phan-extensions/Stubs'
  ],
  
  "exclude_analysis_directory_list" => [
    'vendor/drenso/phan-extensions/Stubs'
  ],
];
```
