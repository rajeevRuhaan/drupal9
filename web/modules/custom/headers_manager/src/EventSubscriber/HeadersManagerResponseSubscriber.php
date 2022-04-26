<?php

namespace Drupal\headers_manager\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Response subscriber to remove these X-Generator header tag.
 */
class HeadersManagerResponseSubscriber implements EventSubscriberInterface {

  /**
   * Remove extra X-Generator header on successful responses.
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   The event to process.
   */
  public function HeadersManagerOptions(FilterResponseEvent $event) {
    $response = $event->getResponse();
    $response->headers->remove('X-Generator');
    #$response->headers->add('Powered by X');
   }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['HeadersManagerOptions', -10];
    return $events;
    }

}
