import ApexCharts from 'apexcharts';

const base_url = document.getElementById('base-url')?.dataset.url ?? null;
	async function getData(){
		const result = await fetch(`${base_url}/api/bookings`)
		.then(result => result.json())
		.then(rs => rs)
		.catch(error => console.error(error));
		return result.data
	}

if (document.getElementById('main-chart')) {
	const result = await getData()
	const options = {
		chart: {
			height: 420,
			type: 'bar',
			fontFamily: 'Inter, sans-serif',
			foreColor: '#6B7280',
			toolbar: {
				show: false
			}
		},
		fill: {
			type: 'solid',
			opacity: 0.5,
		},
		dataLabels: {
			enabled: false
		},
		tooltip: {
			style: {
				fontSize: '14px',
				fontFamily: 'Inter, sans-serif',
			},
		},
		grid: {
			show: false,
		},
		series: [
			{
				name: 'Pemakaian',
				data: result.count,
				color: '#0694a2'
			},
		],
		xaxis: {
			tickPlacement: 'between',
			floating: false,
			categories: result.vehicle,
			labels: {
				style: {
					colors: ['#6B7280'],
					fontSize: '14px',
					fontWeight: 500,
				},
			},
			axisBorder: {
				color: '#F3F4F6',
			},
			axisTicks: {
				color: '#F3F4F6',
			}
		},
		yaxis: {
			labels: {
				style: {
					colors: ['#6B7280'],
					fontSize: '14px',
					fontWeight: 500,
				},
				formatter: function (value) {
					return value + 'x';
				}
			},
		},
		responsive: [
			{
				breakpoint: 1024,
				options: {
					xaxis: {
						labels: {
							show: false
						}
					}
				}
			}
		]
	};

	const chart = new ApexCharts(document.getElementById('main-chart'), options)
	chart.render();
}

