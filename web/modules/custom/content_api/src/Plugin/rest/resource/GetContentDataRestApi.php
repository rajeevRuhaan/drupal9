<?php

namespace Drupal\content_api\Plugin\rest\resource;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;
use Drupal\rest\Plugin\ResourceBase;
use Symphony\Component\HttpKernal\Exception\NotFoundHttpException;
use Symphony\Component\HttpKernal\Exception\BadRequestHttpException;
use Drupal\node\Entity\Node;
use Drupal\paragraphs\Entity\paragraphs;
use Drupal\rest\ModifiedResourceResponse;



/**
* Provides REST API for Content Based on URL.
*
* @RestResource(
* id = "get_content_rest_resource",
* label = @Translation("Content API"),
* uri_paths = {
* "canonical" = "/api/content"
* }
* )
*/

 class GetContentDataRestApi extends ResourceBase {

    /**
     * responds to entity GET requests.
     * @return \Drupal\rest\ResourceResponse
     * returning rest resource
     */

     public function get() {
         if(\Drupal::request()->query->has('url')){
             $url = \Drupal::request()->query->get('url');

             if(!empty(url)){
                 $query = \Drupal::entityQuery('node')->condition('field_unique_uri', $url);

                 $nodes = $query->execute();
                 $node_id = array_values($nodes);

                 if(!empty($node_id)){
                     $data = Node::load($node_id[0]);
                     return new ModifiedResoureResponse($data);
                 }
             }
           
         }
     }
 }