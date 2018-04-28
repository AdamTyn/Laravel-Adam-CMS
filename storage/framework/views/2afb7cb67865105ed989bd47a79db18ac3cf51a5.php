<?php $__env->startSection('slider'); ?>
<?php echo $__env->make('layouts.admins.sliders.systems.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.admins.contents.systems.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $__env->make('layouts.admins.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo e(Html::script(asset('js/echarts.js'))); ?>

<script type="text/javascript">
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
	var timeArray=[];
	for (var i =0; i<7; i++) {
		timeArray[i]=yearArray[i].toString()+'-'+monthArray[i].toString()+'-'+dateArray[i].toString();
	}
	return timeArray;
}
var legendArray = ['总流量', '移动端', '电脑端'];
$(function() {
	$.get('<?php echo e(url('admin/system/getData')); ?>',{},function(back){
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
				data: GetAWeek()
			}],

			yAxis: [{
				type: 'value'
			}],
			series: [{
				name: legendArray[0],
				type: 'line',
				data: back.total,
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
				data: back.mobile,
				itemStyle: {
					normal: {
						color: '#e7505a'
					}
				}
			}, {
				name: legendArray[2],
				type: 'line',
				data: back.pc,
				itemStyle: {
					normal: {
						color: '#9933FF'
					}
				}
			}]
		};
		echartsA.setOption(option);
	});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>