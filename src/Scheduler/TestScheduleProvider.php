<?php

namespace App\Scheduler;

use App\Messages\Test;
use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\RecurringMessage;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;

#[AsSchedule(name: 'default')]
class TestScheduleProvider implements ScheduleProviderInterface
{
	public function getSchedule(): Schedule
	{
    	return (new Schedule())->add(
        	RecurringMessage::every('2 seconds', new Test())
    	);
	}
}