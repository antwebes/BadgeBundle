<?php

namespace ant\BadgeBundle\FormHandler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use FOS\MessageBundle\Composer\ComposerInterface;
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
    protected $sender;
    protected $participantProvider;

    public function __construct(Request $request, ComposerInterface $composer, SenderInterface $sender, ParticipantProviderInterface $participantProvider)
    {
        $this->request = $request;
        $this->composer = $composer;
        $this->sender = $sender;
        $this->participantProvider = $participantProvider;
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
}
