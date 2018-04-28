$(function() {
	var dataJson = {{$dataJson}};
	EchartShow(JSON.parse(dataJson));
});
var legendArray = ['总流量', '移动端', '电脑端'];

function EchartShow(dataArray) {
	var echartsA = echarts.init(document.getElementById('tpl-echarts-A'));
	option = {
		tooltip: {
			trigger: 'axis',
		},
		legend: {
			data: legendArray
		},
		grid: {
			left: '3%',
			right: '4%',
			bottom: '3%',
			containLabel: true
		},
		xAxis: [{
			type: 'category',
			boundaryGap: true,
			data: GetWeek()
		}],

		yAxis: [{
			type: 'value'
		}],
		series: [{
			name: legendArray[0],
			type: 'line',
			data: [120, 132, 101, 134, 90, 230, 210],
			itemStyle: {
				normal: {
					color: '#66CC00'
				},
				emphasis: {

				}
			}
		}, {
			name: legendArray[1],
			type: 'line',
			data: [220, 182, 191, 234, 290, 330, 310],
			itemStyle: {
				normal: {
					color: '#e7505a'
				}
			}
		}, {
			name: legendArray[2],
			type: 'line',
			data: [150, 232, 201, 154, 190, 330, 410],
			itemStyle: {
				normal: {
					color: '#9933FF'
				}
			}
		}]
	};
	echartsA.setOption(option);
}

function GetAWeek() {
	var d = new Date();
	var date = d.getDate();
	var month = d.getMonth();
	var year = d.getFullYear();

	var dateArray = [date - 6, date - 5, date - 4, date - 3, date - 2, date - 1, date];
	var monthArray = [month + 1, month + 1, month + 1, month + 1, month + 1, month + 1, month + 1];
	var yearArray = [year, year, year, year, year, year, year];

	if (date < 7) {
		//
		var dis = 7 - date;
		var Feb = 31;
		if (month == 2) {
			//
			Feb = 27;
			if (year % 4 == 0 || year % 400 == 0) {
				//
				Feb = 28;
			}
		} else if (month == 4 || month == 6 || month == 9) {
			//
			Feb = 30;
		} else if (month == 0) {
			//
			while (dis > 0) {
				dateArray[dis - 1] = Feb - dis + 1;
				yearArray[dis - 1] = year - 1;
				monthArray[dis - 1] = 12;
				dis--;
			}
		} else {
			//
			while (dis > 0) {
				dateArray[dis - 1] = Feb - dis + 1;
				monthArray[dis - 1] = month;
				dis--;
			}
		}
	}
	//
	for (var i =0; i<7; i++) {
		timeArray[i]=yearArray[i].toString()+'-'+monthArray[i].toString()+'-'+dateArray[i].toString();
	}
	return timeArray;
}