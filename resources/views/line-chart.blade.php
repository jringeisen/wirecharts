<div id="wirecharts-card-{{$chartId}}" class="bg-white rounded-lg shadow {{ $height }}">
    <div id="wirecharts-title-{{$chartId}}" class="p-6">
        <p>{{ $title }}</p>
    </div>
    <div id="wirecharts-{{$chartId}}" class="relative ct-chart">
        <div class="hidden absolute inline-block wirecharts-tooltip-{{$chartId}} bg-white text-xs shadow text-center px-3 py-1 rounded-md w-36">
            <span class="wirecharts-tooltip-date-{{$chartId}}"></span><br>
            <span class="wirecharts-tooltip-value-{{$chartId}}"></span>
        </div>
    </div>
</div>

@push('wire-chart-js')
    <script>
        document.addEventListener('livewire:load', () => {
            // Get the height of the card
            var cardHeight = document.querySelector('#wirecharts-card-' + @this.chartId).clientHeight
            // Get the height of the card title.
            var titleHeight = document.querySelector('#wirecharts-title-' + @this.chartId).clientHeight


            var data = {
                // Our series array that contains series objects or in this case series data arrays
                series: [@this.series]
            };

            var options = {
                fullWidth: true,
                chartPadding: {
                    top: 5,
                    bottom: 0,
                    right: 0,
                    left: 0,
                },
                height: cardHeight - titleHeight + 'px',
                axisX: {
                    offset: 0,
                    showGrid: false,
                    showLabel: false
                },
                axisY: {
                    offset: 0,
                    showGrid: false,
                    showLabel: false
                }
            }

            new Chartist.Line('#wirecharts-' + @this.chartId, data, options).on("draw", function (data) {
                if (data.type === "point") {
                    data.element._node.addEventListener('mouseover', e => {
                        const tooltip = document.getElementsByClassName('wirecharts-tooltip-' + @this.chartId)

                        tooltip[0].style.top = data.y - 75 + 'px'
                        tooltip[0].style.left = data.x > 200 ? data.x - 150 + 'px' : data.x + 'px'

                        tooltip[0].classList.remove('hidden')

                        const meta = document.getElementsByClassName('wirecharts-tooltip-date-' + @this.chartId)
                        meta[0].innerHTML = data.meta

                        const value = document.getElementsByClassName('wirecharts-tooltip-value-' + @this.chartId)
                        value[0].innerHTML = data.value.y === 1 ? data.value.y + ' view' : data.value.y + ' views'
                    })

                    data.element._node.addEventListener('mouseleave', e => {
                        const tooltip = document.getElementsByClassName('wirecharts-tooltip-' + @this.chartId)
                        tooltip[0].classList.add('hidden')
                    })
                }
            });
        })
    </script>
@endpush
