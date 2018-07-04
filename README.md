# PhanExtensions
This project contains several extensions (stubs/plugins) to be used with Phan for static PHP analysis.

[![Build Status](https://travis-ci.org/Drenso/PhanExtensions.svg?branch=master)](https://travis-ci.org/Drenso/PhanExtensions)

## Plugins

We currently have the following plugins available:

#### Annotation\SymfonyAnnotationPlugin

Parses all annotation that start with an uppercase letter, in order to check whether they have been imported into
the file, and to remove unused warnings from vanilla Phan if they are used correctly. 

The Symfony version of this plugin (currently the only one) ignores the `Annotation` and `Target` annotation which 
are used in validator definitions.
  
#### DocComment\InlineVarPlugin

Scans each file in the `/src` directory which contains a class (if a file contains multiple classes, it will also be 
scanned for every time a class is defined in it). This plugin is a workaround for a limitation in php-ast, which does
not expose inline comments.
 
#### DocComment\MethodPlugin

Scans each method docblock for the use of the `@method`, in order to set the annotated class as used.

#### DocComment\ThrowsPlugin

Scans each method docblock for the use of the `@throws`, in order to set the annotated class as used.

> **Note**: This plugin is obsolete since Phan 0.12.3, due to 
[this issue](https://github.com/phan/phan/issues/1555#event-1527018367) being closed.

### Usage

You can enable a plugins by adding it to your Phan configuration:

```php
return [
  'plugins' => [
    'vendor/drenso/phan-extensions/Plugin/Annotation/SymfonyAnnotationPlugin.php'
  ],
];
```

# Stubs

We currently have stubs for the following packages:

- curl
- intl
- ldap
- pdo
- radius
- sockets   

You can enable a stub by adding it to your Phan configuration. Note that you also want to disable analysis on the 
specific folder. You probably already added the vendor directory to your configuration (in both lists), in which case
you can skip this setup.

```php
return [
  'directory_list' => [
    'vendor/drenso/phan-extensions/Stubs'
  ],
  
  "exclude_analysis_directory_list" => [
    'vendor/drenso/phan-extensions/Stubs'
  ],
];
```
