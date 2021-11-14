## About Wire Charts
After using Laravel Nova in a handful of projects, I needed the Value and Trend Cards outside of Laravel Nova. So I decided to build a livewire package that uses Chartist.js library to accomplish this.
![Wire Charts trend card](public/images/trend-card.png?raw=true)

## Installation
To get started with Wire Charts, you'll need to require the package.

```php
composer require jringeisen/wirecharts
```
## Add Chartist.js Assets
You'll need the chartist.js assets, make sure to include these in the head of your layout.
```php
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
```

## Publish Views
If you'd like to make modifications to the views, you can do so by using the following command.
```php
php artisan vendor:publish --provider="Jringeisen\WireCharts\WireChartsServiceProvider" --tag="views"
```

## Adding the chart component
To display a chart you'll want to add the component of the chart that you want to add. So for instance, this is how you would add a line chart.

```php
@livewire('line-chart', ['chartId' => '1', 'title' => 'Daily Users', 'series' => $data1, 'height' => 'h-36'])
```

If you plan to have multiple charts on the same page, make sure to have a unique `chartId` for each chart, like so.

```php
@livewire('line-chart', ['chartId' => '1', 'title' => 'Daily Users', 'series' => $data1, 'height' => 'h-36'])
@livewire('line-chart', ['chartId' => '2', 'title' => 'Unique Visitors', 'series' => $data2, 'height' => 'h-36'])
```

The series option requires a specific format.

```php
$data1 = [
    'count' => 100,
    'data' => [
        ['meta' => '2021-01-01', 'value' => 5],
        ['meta' => '2021-01-02', 'value' => 4],
        ['meta' => '2021-01-03', 'value' => 1]
    ]
]
```

## License
Wire Charts is open-sourced software licensed under the MIT license.
