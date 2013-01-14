<?php

namespace ant\BadgeBundle\FormHandler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use ant\BadgeBundle\Composer\ComposerInterface;
use ant\BadgeBundle\FormModel\AbstractBadge;
use FOS\MessageBundle\Security\ParticipantProviderInterface;
use ant\BadgeBundle\Model\BadgeParticipantInterface;
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

        $form->bindRequest($this->request);

        if ($form->isValid()) {
            return $this->processValidForm($form);
        }

        return false;
    }
    
    /**
     * Processes the valid form
     *
     * @param Form
     * @return BadgeInterface 
     */
    public function processValidForm(Form $form)
    {
    	$badge = $this->composeBadge($form->getData()); // $badge is a NewBadgeBuilder
    
    	$this->composer->flush($badge);
    
    	return $badge;
    }
    
    /**
     * Composes a badge from the form data
     *
     * @param AbstractBadge $badge
     * @return BadgeInterface the composed badge
     */
    abstract protected function composeBadge(AbstractBadge $badge);
    
    
}
