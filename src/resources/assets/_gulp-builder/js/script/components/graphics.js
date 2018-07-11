import Chart from '../../../bower_components/chart.js/dist/Chart.js';
const defaultOptions = {
    legend: {
        position:        'bottom',
        labels: {
            boxWidth: 12
        },

    },
    tooltips: {
        mode:           'index',
        intersect:      false,
        position:       'nearest',
        caretSize :     0,
        bodySpacing :   10,
        titleFontSize:  16,
        bodyFontStyle:  18,
        displayLabel: false,
        //not showing labels in the tooltip
        callbacks: {
            label: function(tooltipItem, data) {
               return ' ' + tooltipItem.yLabel;
            }
        }
    },
    scales:{
        xAxes: [{
            gridLines: {
                display: false
            }
        }]
    }
};

const defaultCommonDatasets = {
    fill                : false,
    borderWidth         : 2 //width graphic's line
};
let colorDefault = [
    '#3c8dbc',
    '#00a65a',
    '#f39c12',
    '#d2d6de',
    '#f56954',
    '#00c0ef',
    '#001F3F',
    '#39CCCC',
    '#605ca8',
    '#ff851b',
    '#D81B60',
    '#111111'
];
export class Graphic {
    /**
     * @param el{string} - graphic's class.
     * @param type{string} - type graphic.
     * @param options{Object} - options for plugin.
     * @param data{Object} - data for plugin.
     * @param commonDatasets{Object} - common options to all line graph.
     * @param parent{string} - class parent graphic.
     * @param descriptionBlk{string} - block's class with graph description .
     * @param form{string} - class form.
     */
    constructor(settings) {
        this.el = settings.el;
        this.btnChangeType = settings.btnChangeType;
        this.type = settings.type;
        this.descriptionBlk = settings.descriptionBlk;
        this.parent = settings.parent;
        this.form = settings.form;
        this.options = Object.assign({}, defaultOptions, settings.options);
        this.datasets = Object.assign({}, defaultCommonDatasets, settings.commonDatasets);

        //Combine the default and specified datasets
        let mergeData = {};
        mergeData.datasets = settings.data.datasets.map((el, i)=>{
            function getColor(i) {
                return colorDefault[i];
            }
            let colorLines = {
                borderColor: getColor(i),
                backgroundColor: getColor(i)
            };
            return Object.assign({}, colorLines, this.datasets, settings.data.datasets[i]);
        });


        this.data = Object.assign({}, settings.data, mergeData);
    }

    /**
     * Initialize class.
     */
    init() {
        let chart = this.initChart();
        this.initChangeView(chart);
        this.initUpdateData(chart);
        this.initUserDesc();
    }
    /**
     * Initialize graphic.
     */
    initChart(){
        let _this = this;
        if($(this.el).length == 0) return;
        let chart = new Chart($(_this.el), {
            type: _this.type,
            options: _this.options,
            data: _this.data
        });
        return chart;
    }
    /**
     * Initialize event by click on the button to change type of graphic.
     */
    initChangeView(chart){
        let _this  = this;
        if($(this.btnChangeType).length == 0) return;

        $('body').on('click', this.btnChangeType, function(event){
            event.preventDefault();

            if($(this).siblings(_this.el).length == 0) return;

            switch(_this.type){
                case 'line':
                    _this.type = 'bar';
                    break;
                case 'bar':
                    _this.type = 'line';
                    break;
                default:
                    _this.type = 'line';
            }
            console.log(chart);
            chart.destroy();
            chart = _this.initChart();
        })
    }
    initUpdateData(chart){
        let _this  = this;
        if($(this.form).length == 0) return;

        let thatField = $(this.form).find('input, select');
        thatField.on('change', function (event) {
            //field change check
            if($(this).attr('data-value') == $(this).val()){
                return;
            }
            $(this).attr('data-value', $(this).val());

            let thatForm = $(this).closest(_this.form);

            let url = thatForm.attr('action');
            let metod = thatForm.attr('metod');
            _this.sendRequest(url, thatForm, metod);
            console.log(chart);
            chart.destroy();
            chart = _this.initChart();
        })

    }
    initUserDesc(){
        if($(this.descriptionBlk).length == 0) return;
        let $thatDescriptions = $(this.el).closest(this.parent).find(this.descriptionBlk);
        let _this = this;
        $thatDescriptions.each(function(i) {
            $(this).css('border-color', _this.data.datasets[i].backgroundColor);
        });
    }
    sendRequest(url, form, method = 'POST'){
        let _this = this;
        $.ajax({
            type: method,
            data: form.serialize(),
            url : url,
            success: function(data) {
                _this.data = data;
            },
            error: function () {
                _this.data = {
                    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [
                        {
                            label               : 'label-item1 ',
                            data                : [28, 48, 40, 19, 86, 27, 40],
                        },
                        {
                            backgroundColor     :'#f56954',
                            borderColor         :'#f56954', //color graphic's line
                            label               : 'label-item2',
                            data                : [28, 32, 40, 15, 68, 37, 90],
                        }
                    ]

                };
                console.log('error send');
            }
        });
    };
}
