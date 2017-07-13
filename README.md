# prettyhp
![Logo](https://www.mysenko.com/images/prettyhp_logo_512_transp2.png)

[![Build Status](https://travis-ci.org/dusterio/prettyhp.svg?branch=master)](https://travis-ci.org/dusterio/prettyhp)
[![Code Climate](https://codeclimate.com/github/dusterio/prettyhp/badges/gpa.svg)](https://codeclimate.com/github/dusterio/prettyhp/badges)
[![Latest Stable Version](https://poser.pugx.org/dusterio/prettyhp/v/stable)](https://packagist.org/packages/dusterio/prettyhp)
[![Total Downloads](https://poser.pugx.org/dusterio/prettyhp/downloads)](https://packagist.org/packages/dusterio/prettyhp)
[![License](https://poser.pugx.org/dusterio/prettyhp/license)](https://packagist.org/packages/dusterio/prettyhp)

PrettyHP is an opinionated PHP code formatter

It removes all original styling and ensures that all outputted code conforms to a consistent style.

PrettyHP will try to comply with PSR as much as possible.

Inspired by JavaScript's [prettier](https://github.com/prettier/prettier)

## But why?

Your IDE or editor may already have some basic formatting built-in, but:

- At least PhpStorm cannot re-format code automatically before committing to VCS;
- Different team members may have different editors, views and standards;
- At least PhpStorm doesn't really enforce styling, it just does some basic indenting.

## Installation

```bash
$ composer require --dev dusterio/prettyhp
```

We recommend to add a pre-commit Git hook so that any modified PHP files are
prettified right before the commit:

```bash
$ cat .git/hooks/pre_commit
```

## Manual usage

PrettyHP is meant for PSR 4 compliant files – one file should contain one PHP class.

```bash
$ vendor/bin/prettyhp [filename]
```
