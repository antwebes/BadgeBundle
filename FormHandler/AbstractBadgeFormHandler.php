<?php

namespace Ant\BadgeBundle\FormHandler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Ant\BadgeBundle\Composer\ComposerInterface;
use Ant\BadgeBundle\FormModel\AbstractBadge;
use FOS\MessageBundle\Security\ParticipantProviderInterface;
use FOS\MessageBundle\Sender\SenderInterface;

/**
 * Handles badge forms, from binding request to create badge
 *
 * @author Pablo <pablo@antweb.es>
 */
abstract class AbstractBadgeFormHandler
{
    protected $request;
    protected $composer;

    public function __construct(Request $request, ComposerInterface $composer)
    {
        $this->request = $request;
        $this->composer = $composer;
    }

    /**
     * Processes the form with the request
     *
     * @param Form $form
     * @return Badge|false if the form is bound and valid, false otherwise
     */
    public function process(Form $form)
    {
        if ('POST' !== $this->request->getMethod()) {
            return false;
        }

        // Use handleRequest() instead of bindRequest or submit() is the preferred way
        // http://symfony.com/doc/current/book/forms.html#handling-form-submissions
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            return $this->processValidForm($form);
        }

        return false;
    }
    
    
    
}
