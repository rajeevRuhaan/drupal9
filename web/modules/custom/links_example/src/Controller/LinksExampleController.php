<?php

/**
* @file
* Contains \Drupal\links_example\Controller\LinksExampleController
*/

namespace Drupal\links_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

class LinksExampleController extends ControllerBase {

 public function links() {

   $url1 = Url::fromRoute('block.admin_display');
   $link1 = Link::fromTextAndUrl(t('Go to the Block admin page'), $url1);
   $list[] = $link1;

  // link to /admin content
  $url2 = Url::fromRoute('system.admin_content');
  $link2 = Link::fromTextAndUrl(t('Go to the content admin page'), $url2);
  $list[] = $link2;

  // link to /admin/people
  $url3 = Url::fromRoute('entity.user.collection');
  $link3 = Link::fromTextAndUrl(t('Go to the user admin page'), $url3);
  $list[] = $link3;

  // go to home front page
  $url4 = Url::fromRoute('<front>');
  $link4 = Link::fromTextAndUrl(t('Go to the front page our awesome site'), $url4);
  $list[] = $link4;

  // go to external site
  $url5 = Url::fromUri('https://drupal.org');
  $link_options = [
    'attributes'=> [
      'target' => '_blank',
      'title' => 'Links to Drupal official home page',
    ],
  ];
  $url5->setOptions($link_options);
  $link5 = Link::fromTextAndUrl(t('Go to the Drupal.org site'), $url5);
  $list[] = $link5;

  // mount the render output
  $output['links_example'] = [
    '#theme' => 'item_list',
    '#items' => $list,
    '#title' => $this->t('Example of links in Drupal 9'),
  ];
  return $output;
 }
}
