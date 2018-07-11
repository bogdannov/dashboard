/**
 * User interface elements init
 * @type {{data_tables_init: Function, dependent_selects_init: Function, date_picker_init: Function}}
 */

const Switch = require('weatherstar-switch');


export let ui = {

    //Data tables functionality

    data_tables_init: function(item) {


        //Choosing a language

        let settingsLang = {
            ru: {
                "language": {
                    "lengthMenu": "Показывать по _MENU_",
                    "zeroRecords": "Пока ничего нет",
                    "info": "Показано _PAGE_ из _PAGES_",
                    "infoEmpty": "Ничего не найдено",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Поиск",
                    paginate: {
                        first: "Первая",
                        previous: "Предыдущая",
                        next: "Следующая",
                        last: "Последняя"
                    }
                }
            },
            en: {
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries"
            }
        };

        let setting = {
            "fnDrawCallback": function( oSettings ) {
                ui.switchery($('.js-switch'));
                // ui.iCheckInit();
            }
        };

        let initSettings = settingsLang[app.locale];



        let table = $(item).DataTable(Object.assign({}, setting , initSettings ));

        //Choosing/rechoosing a row/all rows

        let allCheckboxesWraps = $('.js_selectRow');

        $('.js_selectAllRows').on('ifChecked', function(event){

            $(allCheckboxesWraps).each(function () {

                $(this).prop('checked', true);
                $(this).parent().addClass('checked');
                let currentRow = $(this).closest('tr');
                $(currentRow).addClass('active');

            });

        });

        $('.js_selectAllRows').on('ifUnchecked', function(event){

            $(allCheckboxesWraps).each(function () {
                let allCheckboxes = $(allCheckboxesWraps).closest('.icheckbox_minimal');
                $(allCheckboxes).removeClass('checked');
                let currentRow = $(this).closest('tr');
                $(currentRow).removeClass('active');
            });

        });


        $('.js_selectRow').on('ifToggled', function(event){

            if ($(this).is(':checked')){
                let currentRow = $(this).closest('tr');
                $(currentRow).addClass('active');
            } else{
                let currentRow = $(this).closest('tr');
                $(currentRow).removeClass('active');
            }

        });

        // deleting a row

        $('body').on('click', '.js_deleteRowBtn', function(event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        })

    },

    /**
     * Init select with dependencies possibility
     */
    dependent_selects_init: function() {
        $('body').on('change', '.js_depend_select', function() {

            var depended_select = $($(this).data('depend'));
            $(depended_select).html('');

            var data_src = $(this).data('src') + '/' + $(this).val();

            controls.ajax_action(data_src, 'GET',
                function(data) {
                    var options = $.parseJSON(data);
                    if (options.length > 0) {
                        options.forEach(function(item) {
                            $(depended_select).prepend('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    }
                },
                function(errors) {
                    console.log(errors);
                }
            )
        });
    },

    
    /*Init editor for textarea*/
    editor_init: function(el) {
        //$(el).wysihtml5();
        // $(el).trumbowyg({
        //     lang: 'ru',
        //     autogrow: true
        // });
        if($('#'+el).length == 0){
           return;
        }
        CKEDITOR.basePath = document.location.origin + '/webmagic/dashboard';

        CKEDITOR.replace( el, {
             customConfig:'',
             stylesSet: false,
             title : false,
             language: 'ru',
             contentsCss : CKEDITOR.basePath  + '/css/style.css',
             allowedContent: true,
             toolbar : [
                	{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
                    { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                    { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
                    { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
                        'HiddenField' ] },
                    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
                    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','-','CreateDiv',
                    '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
                    { name: 'links', items : [ 'Link','Unlink', ] },
                    { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
                    { name: 'styles', items : [ 'Format','Font','FontSize' ] },
                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                    { name: 'tools', items : [ 'Maximize', 'ShowBlocks',] }
            ],
        });
    },

    /*Collapse all box in form edit*/
    box_collapse: function() {
        $('.with-collapse').find('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
        $('.with-collapse').find('.box').addClass('collapsed-box');
    },

    selectEl : function(el){
        $(el).select2();
    },
    selectWithoutSearch :  function(el){
        $(el).select2({
            minimumResultsForSearch: Infinity
        });
    },
    iCheckInit : function () {
        $('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass   : 'iradio_minimal'
        })

    },
    /*@param el{string} - class checkbox*/
    selectedAll: function(el){
      $('body').on('change', el, function (event) {
          let thisSelect = $($(this).attr('data-select'));
          if($(el).is(':checked') ){
              thisSelect.find('option').prop("selected","selected");// Select All Options
              thisSelect.trigger("change");// Trigger change to select 2
          }else{
              thisSelect.find('option').removeAttr("selected");
              thisSelect.trigger("change");// Trigger change to select 2
          }
      });
      //for checkbox with iCheck plugin
      $(el).on('ifChanged', function(event){
          let thisSelect = $($(this).attr('data-select'));
          if($(el).is(':checked') ){
              thisSelect.find('option').prop("selected","selected");// Select All Options
              thisSelect.trigger("change");// Trigger change to select 2
          }else{
              thisSelect.find('option').removeAttr("selected");
              thisSelect.trigger("change");// Trigger change to select 2
          }
      });
    },

    switchery : function(elements){

        $.each(elements, function(i,el){
            var size = $(el).data('size');
            var color = $(el).data('color');
            var secondaryColor = $(el).data('secondary');
            var jackColor = $(el).data('jack');
            if(!color) color = '#3cb53d';

            new Switch(el,{
                size: size,
                color : color,
                secondaryColor : secondaryColor,
                jackColor: jackColor
            });
        })
    },
     color_picker: function(el){
        $(el).colorpicker();
    },

    showHideBlk (btn, blk){
        $('body').on('click', btn, function() {
            $(blk).slideToggle(400);
            let arrow = $(this).find('.js_arrow');
            if($(arrow).hasClass('fa-angle-right')){
                $(arrow).removeClass('fa-angle-right').addClass('fa-angle-down');
            } else{
                $(arrow).removeClass('fa-angle-down').addClass('fa-angle-right');
            }
        })
    },
};