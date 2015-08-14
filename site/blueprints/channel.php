<?php if(!defined('KIRBY')) exit ?>

title: Category
pages: true
  num: date
  sort: flip
  limit: 50
  template:
    - default
    - link
    - image
    - embed
    - quote
    - video
    - status
    - chat
    - list
fields:
  title:
    placeholder: Title
    type: text
  title_short:
    placeholder: Short Title
    type: text
  browse_more_label:
    placeholder: Browse More Label
    type: text
    help: ex. "More on Technology"