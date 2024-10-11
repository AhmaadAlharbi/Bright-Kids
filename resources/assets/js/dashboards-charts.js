/********** Sales Report Chart **********/
var element = document.getElementById("Sales-bar");
if (element !== null) {
  element.innerHTML = "";
	var options1 = {
		series: [{
			name: 'success',
			data: [74, 85, 57, 56, 76, 35, 61, 98, 36, 50, 48, 29]
		}, {
			name: 'Pending',
			data: [46, 35, 101, 98, 44, 55, 57, 56, 55, 34, 79, 46]
		}, {
			name: 'Failed',
			data: [26, 35, 41, 78, 34, 65, 27, 46, 37, 65, 49, 23]
		}],
		chart: {
			height: 256,
			type: "bar",
			toolbar: {
				show: false,
			},
			fontFamily: 'Nunito, sans-serif',
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			endingShape: 'rounded',
			colors: ['transparent'],
		},
		grid: {
			borderColor: '#f3f3f3',
			xaxis: {
				lines: {
					show: false
				}
			},
		},
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false,
			},
		},
		yaxis: {
			axisBorder: {
				show: false,
			},
		},
		legend: {
			show: false
		},
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		markers: {
			size: 0
		},
		colors: ['#0162e8', '#f93a5a', '#f7a556'],
		plotOptions: {
			bar: {
				columnWidth: "45%",
				endingShape: 'rounded',
			}
		},
		fill: {
			opacity: 1
		},
		legend: {
			show: false,
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return "$ " + val + " thousands"
				}
			}
		}
	};
	// document.getElementById('Sales-bar').innerHTML = ''
	var chart1 = new ApexCharts(document.querySelector("#Sales-bar"), options1);
	chart1.render();
}
export function salesReport(myVarVal) {
	chart1.updateOptions({
		colors: ["rgb(" + myVarVal + ")", "#f93a5a", "#f7a556"],
	})
}

var element = document.getElementById("chart");
if (element !== null) {
  element.innerHTML = "";
	var options = {
		chart: {
			width: 200,
			height: 205,
			responsive: 'true',
			reset: 'true',
			type: 'radialBar',
			offsetX: 0,
			offsetY: 0,
		},
		plotOptions: {
			radialBar: {
				responsive: 'true',
				startAngle: -135,
				endAngle: 135,
				size: 120,
				imageWidth: 50,
				imageHeight: 50,

				track: {
					strokeWidth: "80%",
					background: '#ecf0fa',
				},
				dropShadow: {
					enabled: false,
					top: 0,
					left: 0,
					bottom: 0,
					blur: 3,
					opacity: 0.5
				},
				dataLabels: {
					name: {
						fontSize: '16px',
						color: undefined,
						offsetY: 30,
					},
					hollow: {
						size: "60%"
					},
					value: {
						offsetY: -10,
						fontSize: '22px',
						color: undefined,
						formatter: function (val) {
							return val + "%";
						}
					}
				}
			}
		},
		colors: ['#0db2de'],
		fill: {
			type: "gradient",
			gradient: {
				shade: "dark",
				type: "horizontal",
				shadeIntensity: .5,
				gradientToColors: ['#0162e8'],
				inverseColors: !0,
				opacityFrom: 1,
				opacityTo: 1,
				stops: [0, 100]
			}
		},
		stroke: {
			dashArray: 4
		},
		series: [83],
		labels: [""]
	};

	document.querySelector('#chart').innerHTML = ""
	var chart = new ApexCharts(document.querySelector("#chart"), options);
	chart.render();
}
export function sales(myVarVal) {
	chart.updateOptions({
		fill: {
			type: "gradient",
			gradient: {
				shade: "dark",
				type: "horizontal",
				shadeIntensity: .5,
				gradientToColors:["rgb(" + myVarVal + ")"],
				inverseColors: !0,
				opacityFrom: 1,
				opacityTo: 1,
				stops: [0, 100]
			}
		},
	})
}

export function vectormap(myVarVal) {
	document.querySelector('#us-map1').innerHTML = ""
		/* us vector map */
		var map = new jsVectorMap({
		selector: "#us-map1",
		map: "us_merc_en",
		regionStyle: {
			initial: {
				stroke: "#e9e9e9",
				strokeWidth: .15,
				fill: "rgb(" + myVarVal + ")",
				fillOpacity: 1,
				enableZoom: false,
			}
		},
		});
}