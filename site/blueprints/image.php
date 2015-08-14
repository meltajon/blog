<?php if(!defined('KIRBY')) exit ?>

title: Image
pages: false
files: true
fields:
  author:
    type: checkboxes
    options:
      melmyfinger: melmyfinger
      meltajon: meltajon
    default: melmyfinger
    width: 3/4
  title:
    placeholder: Title
    type:  text
    width: 3/4
    required: true
  date:
    type: date
    width: 1/4
    required: true
  meta_title: 
    placeholder: SEO Meta Title
    type: text
    width: 3/4
  is_featured:
    type: checkbox
    text: Featured
    width: 1/4
  body:
    type:  textarea
  excerpt:
    type: textarea
    placeholder: Excerpt
    size: small
    buttons: 
  meta_description: 
    placeholder: SEO Meta Description
    type: textarea
    size: small
    buttons: 
  source_info:
    type: info
    label: Citations
  source_name:
    placeholder: Source Name
    width: 1/4
  source_url:
    type: url
    width: 3/4
  via_name:
    placeholder: via Name
    width: 1/4
  via_url:
    type: url
    width: 3/4
  line_tags:
    type: line
  categories:
    label: Categories
    type: tags
    index: all
    options:
      industry-trends: Industry Trends
      mobile-trends: Mobile Trends
      product-design: Product Design
      products: Product Picks
      smartphones: Smartphones
      smartwatches: Smartwatches
      tablets: Tablets
      predictions: Predictions
      first-impressions: First Impressions
      reviews: Reviews
      tech-ideas: Tech Ideas
      tech-life: Tech Life
      ux: User Experience

      the577: the577
      webb: Webb
      cal-poly: Cal Poly
      pringo: Pringo
      btvfam: BTVfam
      music-fam: Music Fam
      ohana: Ohana

      ask: Ask Mel
      diary: Diary
      emotions: Emotions
      surveys: Surveys
      testimonials: Testimonials
      heartstrings: Heartstrings
      inspiration: Inspiration
      wisdom: Wisdom

      originals: Originals
      buzz: Buzzworthy
      rants: Rants
  mentions:
    label: Mentions
    type:  tags
    index: all
    lower: true
  hashtags:
    label: Hashtags
    type:  tags
    index: all
    lower: true
  featured_image_line:
    type: line
  featured_image_info:
    type: info
    label: Featured Image
  featured_name:
    type: text
    placeholder: Featured Name
  featured_title:
    type: text
    placeholder: Featured Title
  featured_source_name:
    type: text
    placeholder: Featured Source Name