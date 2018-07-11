/**
 * Range data picker init
 */

export let date_picker = {
    init: function() {
        $('.js_date_range_picker-reservation').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "timePicker12Hour": false,
            "minDate": '2017-11-05',
            "startDate": '2017-11-05'
        },function(start, end, label) {
            $('.js_date_range_picker-reservation').val(start.format('YYYY/MM/DD/ HH:mm'))
            var End_date = start.format('MM/DD/YYYY');
            date_picker.end(End_date)
        });
    },

    end:function(End_date){
        if(End_date != undefined){
                    $('.js_date_range_picker-reservation-end').daterangepicker({
                        singleDatePicker: true, 
                        timePicker: true, 
                        "timePicker12Hour": false,
                        minDate: End_date,
                        startDate: End_date,
            },function(start, end, label) {
                $('.js_date_range_picker-reservation-end').val(start.format('YYYY/MM/DD/ HH:mm'))
            });
        }
    }
};

export let datatime_picker = {
        init: function(){
          var dataTime = $('.js_date_range_picker').data('time');
          var dataDate = $('.js_date_range_picker').data('date');
          var dataFormat = $('.js_date_range_picker').data('format');
          datatime_picker.initStart(dataTime, dataDate, dataFormat);
        },
        initStart: function(timepick, datepick, dataFormat){
            $.datetimepicker.setLocale([app.locale]);
            $('.js_date_range_picker').datetimepicker({
                dayOfWeekStart: 1,
                timepicker:timepick,
                datepicker:datepick,
                format: dataFormat,
                formatDate:dataFormat,
                onChangeDateTime: function(){
                    var dataTime = $('.js_date_range_picker-end').data('time');
                    var dataDate = $('.js_date_range_picker-end').data('date');
                    var format = $('.js_date_range_picker-end').data('format');
                    var dataformat= $('.js_date_range_picker').data('format');
                    var minDate = $('.js_date_range_picker').val();
                    datatime_picker.initEnd(dataTime, dataDate, format, dataformat, minDate);
                }
            });
        },
        initEnd:function(timepick, datepick, format, dataFormat, minDate){
            $('.js_date_range_picker-end').datetimepicker({
                timepicker:timepick,
                datepicker:datepick,
                format: format,
                formatDate:dataFormat,
                dayOfWeekStart: 1,
                minDate: minDate
            })
        },
};