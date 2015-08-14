<?php if(!defined('KIRBY')) exit ?>

title: Wordpress Quote
pages: true
  num: date
  sort: flip
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
  date:
    type: date
    width: 1/4
  meta_title: 
    placeholder: SEO Meta Title
    type: text
    width: 3/4
  is_listed:
    type: checkbox
    text: List on MT.com
    width: 1/4
  body:
    type:  textarea
  excerpt:
    type:  textarea
    placeholder: Excerpt
  meta_description: 
    placeholder: SEO Meta Description
    type: textarea
    size: small
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
  legacy_via:
    type: text
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
  circles:
    type: checkboxes
    label: Tagged Circles
    options:
      family: Family
      music-fam: Music Fam
      btvfam: BTVfam
      lakers: LA Lakers
      cal-poly: Cal Poly
      udhailiyah: Udhailiyah
      webb: Webb
      work: Work
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
  meta_keywords: 
    placeholder: SEO Meta Keywords
    type: text
  is_featured:
    type: checkbox
    text: Featured Post
    width: 1/2
  theme:
    type: text
    text: Theme
    default: A01
    placeholder: Theme
    width: 1/2
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
  wordpress_line:
    type: line
  wordpress_info:
    type: info
    label: Wordpress Info
  legacy_url:
    type: url
    placeholder: Wordpress URL
  legacy_guid:
    type: url
    placeholder: GUID
  legacy_slug:
    type: text
    placeholder: Post Slug
    width: 3/4
  legacy_id:
    type: number
    placeholder: Post ID
    width: 1/4
  legacy_post_format:
    type: text
    placeholder: Post Format
    width: 1/2
  legacy_date:
    type: text
    placeholder: Post Date
    width: 1/2
  legacy_date_gmt:
    type: text
    placeholder: Post Date GMT
    width: 1/2
  legacy_pub_date:
    type: text
    placeholder: Publish Date
    width: 1/2
  legacy_categories:
    type: tags
  legacy_is_private:
    type: checkbox
    text: Private
    width: 1/4