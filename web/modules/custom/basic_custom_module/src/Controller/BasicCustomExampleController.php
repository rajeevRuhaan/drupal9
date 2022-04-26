<?php

namespace Drupal\basic_custom_module\Controller;

use Drupal\Core\Controller\ControllerBase;
/**
 * Controller for the basic custom module
 */

class BasicCustomExampleController extends ControllerBase {

    /**
     * Simple basic custom moduele controller
     * @retrun array
     * Return just an array with piece of mark up to render in screen
     */
    public function basicCustom() {
        return [
            '#markup' => $this->t('So this is basically a custom drupal 9 module example'),
        ];
    }


}