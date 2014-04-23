<?php namespace Days\Support;

use Days\Support\DayComposer;


class PaddedDayComposer extends DayComposer
{
    public function compose($view)
    {
        parent::compose($view);

        $this->view->with('day3', $this->getPaddedDayValue());
    }

    public function getPaddedDayValue()
    {
        return substr('000' . $this->getConfigField(self::DAY_NUMBER), -3);
    }

}

