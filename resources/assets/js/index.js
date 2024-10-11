
(function () {
	"use strict";

	var options = {
		series: [{
			name: "Value",
			data: [5, 9, 5, 6, 4, 12, 18, 14, 10, 15, 12, 5, 8, 5, 12, 5, 12, 10, 16, 12]
		}],
		chart: {
			type: 'area',
			height: 30,
			sparkline: {
				enabled: true
			}
		},
		colors: ['rgba(255, 255, 255, 0.5)'],
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'straight',
			width: 2,
		},
		yaxis: {
			min: 0,
			show: false,
			axisBorder: {
				show: false
			},
		},
		xaxis: {
			show: false,
			axisBorder: {
				show: false
			},
		},
		tooltip: {
			enabled: false,
		},
	};

	var chart = new ApexCharts(document.querySelector("#compositeline"), options);
	chart.render();
	var options = {
		series: [{
			name: "Value",
			data: [3, 2, 4, 6, 12, 14, 8, 7, 14, 16, 12, 7, 8, 4, 3, 2, 2, 5, 6, 7]
		}],
		chart: {
			type: 'area',
			height: 30,
			sparkline: {
				enabled: true
			}
		},
		colors: ['rgba(255, 255, 255, 0.5)'],
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'straight',
			width: 2,
		},
		yaxis: {
			min: 0,
			show: false,
			axisBorder: {
				show: false
			},
		},
		xaxis: {
			show: false,
			axisBorder: {
				show: false
			},
		},
		tooltip: {
			enabled: false,
		},
	};

	var chart = new ApexCharts(document.querySelector("#compositeline2"), options);
	chart.render();
	var options = {
		series: [{
			name: "Value",
			data: [5, 10, 5, 20, 22, 12, 15, 18, 20, 15, 8, 12, 22, 5, 10, 12, 22, 15, 16, 10]
		}],
		chart: {
			type: 'area',
			height: 30,
			sparkline: {
				enabled: true
			}
		},
		colors: ['rgba(255, 255, 255, 0.5)'],
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'straight',
			width: 2,
		},
		yaxis: {
			min: 0,
			show: false,
			axisBorder: {
				show: false
			},
		},
		xaxis: {
			show: false,
			axisBorder: {
				show: false
			},
		},
		tooltip: {
			enabled: false,
		},
	};
	var chart = new ApexCharts(document.querySelector("#compositeline3"), options);
	chart.render();

	var options = {
		series: [{
			name: "Value",
			data: [5, 9, 5, 6, 4, 12, 18, 14, 10, 15, 12, 5, 8, 5, 12, 5, 12, 10, 16, 12]
		}],
		chart: {
			type: 'area',
			height: 30,
			sparkline: {
				enabled: true
			}
		},
		colors: ['rgba(255, 255, 255, 0.5)'],
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'straight',
			width: 2,
		},
		yaxis: {
			min: 0,
			show: false,
			axisBorder: {
				show: false
			},
		},
		xaxis: {
			show: false,
			axisBorder: {
				show: false
			},
		},
		tooltip: {
			enabled: false,
		},
	};
	var chart = new ApexCharts(document.querySelector("#compositeline4"), options);
	chart.render();

	/*--- Apex (#spark1) ---*/
	var spark1 = {
		chart: {
			id: 'spark1',
			group: 'sparks',
			type: 'line',
			height: 38,
			responsive: 'true',
			sparkline: {
				enabled: true
			},
			dropShadow: {
				enabled: true,
				top: 1,
				left: 1,
				blur: 1,
				opacity: 0.1,
			}
		},
		series: [{
			data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
		}],
		stroke: {
			curve: 'smooth'
		},
		markers: {
			size: 0
		},
		grid: {
			padding: {
				top: 10,
				bottom: 10,
				left: 50
			}
		},
		colors: ['#0a9ae1'],
		stroke: {
			width: 2
		},
		tooltip: {
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function formatter(val) {
						return '';
					}
				}
			}
		}
	}
	/*--- Apex (#spark1) closed ---*/

	/*--- Apex (#spark2) ---*/
	var spark2 = {
		chart: {
			id: 'spark2',
			group: 'sparks',
			type: 'line',
			height: 38,
			responsive: 'true',
			sparkline: {
				enabled: true
			},
			dropShadow: {
				enabled: true,
				top: 1,
				left: 1,
				blur: 1,
				opacity: 0.1,
			}
		},
		series: [{
			data: [12, 14, 2, 47, 32, 44, 14, 55, 41, 69]
		}],
		stroke: {
			curve: 'smooth'
		},
		grid: {
			padding: {
				top: 10,
				bottom: 10,
				left: 50
			}
		},
		markers: {
			size: 0
		},
		colors: ['#ff516e'],
		stroke: {
			width: 2
		},
		tooltip: {
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function formatter(val) {
						return '';
					}
				}
			}
		}
	}
	/*--- Apex (#spark2) closed ---*/

	/*--- Apex (#spark3) ---*/
	var spark3 = {
		chart: {
			id: 'spark3',
			group: 'sparks',
			type: 'line',
			height: 38,
			responsive: 'true',
			sparkline: {
				enabled: true
			},
			dropShadow: {
				enabled: true,
				top: 1,
				left: 1,
				blur: 1,
				opacity: 0.1,
			}
		},
		series: [{
			data: [47, 45, 74, 32, 56, 31, 44, 33, 45, 19]
		}],
		stroke: {
			curve: 'smooth'
		},
		markers: {
			size: 0
		},
		grid: {
			padding: {
				top: 10,
				bottom: 10,
				left: 50
			}
		},
		colors: ['#28b98a'],
		xaxis: {
			crosshairs: {
				width: 1
			},
		},
		stroke: {
			width: 2
		},
		tooltip: {
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function formatter(val) {
						return '';
					}
				}
			}
		}
	}
	/*--- Apex (#spark3) closed ---*/

	/*--- Apex (#spark4) ---*/

	var spark4 = {
		chart: {
			id: 'spark4',
			group: 'sparks',
			type: 'line',
			height: 38,
			responsive: 'true',
			sparkline: {
				enabled: true
			},
			dropShadow: {
				enabled: true,
				top: 1,
				left: 1,
				blur: 1,
				opacity: 0.1,
			}
		},
		series: [{
			data: [15, 75, 47, 65, 14, 32, 19, 54, 44, 61]
		}],
		stroke: {
			curve: 'smooth'
		},
		markers: {
			size: 0
		},
		grid: {
			padding: {
				top: 10,
				bottom: 10,
				left: 50
			}
		},
		colors: ['#f48846'],
		xaxis: {
			crosshairs: {
				width: 1
			},
		},
		stroke: {
			width: 2
		},
		tooltip: {
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function formatter(val) {
						return '';
					}
				}
			}
		}
	}
	/*--- Apex (#spark4) closed ---*/

	/*--- Apex (#spark5) ---*/
	var spark5 = {
		chart: {
			id: 'spark5',
			group: 'sparks',
			type: 'line',
			height: 38,
			responsive: 'true',
			sparkline: {
				enabled: true
			},
			dropShadow: {
				enabled: true,
				top: 1,
				left: 1,
				blur: 1,
				opacity: 0.1,
			}
		},
		series: [{
			data: [12, 25, 76, 35, 17, 43, 10, 26, 69, 31]
		}],
		stroke: {
			curve: 'smooth'
		},
		markers: {
			size: 0
		},
		grid: {
			padding: {
				top: 10,
				bottom: 10,
				left: 50
			}
		},
		colors: ['#673ab7'],
		stroke: {
			width: 2
		},
		yaxis: {
			min: 0,
			show: false,
			axisBorder: {
				show: false
			},
		},
		xaxis: {
			show: false,
			axisBorder: {
				show: false
			},
			crosshairs: {
				width: 1
			},
		},
		tooltip: {
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function formatter(val) {
						return '';
					}
				}
			}
		}
	}


	new ApexCharts(document.querySelector("#spark1"), spark1).render();
	new ApexCharts(document.querySelector("#spark2"), spark2).render();
	new ApexCharts(document.querySelector("#spark3"), spark3).render();
	new ApexCharts(document.querySelector("#spark4"), spark4).render();
	new ApexCharts(document.querySelector("#spark5"), spark5).render();

	/*--- Apex (#spark5) closed ---*/


})();
