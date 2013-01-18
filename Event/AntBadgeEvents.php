<?php

namespace ant\BadgeBundle\Event;

/**
 * Declares all events thrown in the BadgeBundle
 */
final class AntBadgeEvents
{
    /**
     * The POST_PUBLISH event occurs after an user have published
     * The event is an instance of ant\BadgeBundle\Event\RankEvent
     *
     * @var string
     */
    const POST_PUBLISH = 'ant_badge.post_publish';

}
