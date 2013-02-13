<?php

namespace Ant\BadgeBundle\Event;

/**
 * Declares all events thrown in the BadgeBundle
 */
final class AntBadgeEvents
{
    /**
     * The POST_PUBLISH event occurs after an user have published
     * The event is an instance of Ant\BadgeBundle\Event\BadgeEvent
     *
     * @var string
     */
    const POST_PUBLISH = 'ant_badge.post_publish';
    /**
     * The POST_ACQUIRED event occurs after an user acquired a badge
     * The event is an instance of Ant\BadgeBundle\Event\RankEvent
     *
     * @var string
     */
    const POST_ACQUIRED = 'ant_badge.post_acquired';

}
