<?php

namespace Jringeisen\WireCharts;

use Livewire\Component;

class LineChart extends Component
{
    public $chartId = '1';

    public $title = 'Daily Users';

    public $height = 'h-48';

    public $series = [];

    public function render()
    {
        return view('wirecharts::line-chart');
    }
}
