import { image } from './components/image.js'
import { ajax_form, Submit_transfer  }  from './components/ajax_form.js'
import { ui } from './components/ui_components.js'
import { datatime_picker, date_picker  } from './components/data_range.js'
import { modals  } from './components/modals.js'
import { fields } from './components/requests.js'
import { sortable } from './components/sortable.js'
import { Updating }  from './components/updating.js'
import { getToken } from '../libs/getToken';
import { getLocale } from './components/locale';
import { Graphic } from './components/graphics';


$(document).ready(function() {
    global.app = new App();
    global.app.init();
});

/**
 * Base app object
 * @type {{init: Function}}
 */
class App {
    constructor(){
        let localeSettings = getLocale();
        this.locale = localeSettings.locale ;

        this.csrf_token = getToken();
    }
    init() {
        item.create_btn_init('.js_create');
        item.delete_btn_init('.js_delete');
        ui.data_tables_init('.js_data_table');
        ui.dependent_selects_init();
        ui.selectEl('.js-select2');
        ui.selectWithoutSearch('.js_ui-base-select');
        datatime_picker.init();

        ui.showHideBlk('.js_showHideBtn', '.js_showHideBlk');

       ui.switchery($('.js-switch'));

        //iCheck for checkbox and radio inputs
        ui.iCheckInit();

        ui.selectedAll('.js_ui-checkbox-selected-all');
        $('*').tooltip({
            track: true,
        });
        ui.editor_init('ckEditor');
    
    $('#menu *[title]').tooltip('disable');
       $('[data-toggle="tooltip"]').tooltip("destroy");
        
        ui.box_collapse();


        ui.color_picker('.js-color-pick');

        // Sortable init, for now bower
        // can't load librirary, and i comment it
        sortable.init('.js-sortable');


        /**
         * Initialize ajax sending form
         */
        //todo Rename class from js-submit -> js-form
        ajax_form.submit_init('.js-submit');


        // Function auto-updating 
        $.each($('.js-update'), function(i, el){
            new Updating(el);
        });

        media.select('.js-media-select');
        media.uploadPreview('.js-input-preview');
        media.checkAllBtnInit('.js-media-checkAll');

        image.uploadPreview('.js_image-preview');

        let submit_transfer1 = new Submit_transfer('.js-send-click', '.js-send-change');
        /**
         * Init multi fields
         */
        fields.init({
            src: '.js-src',
            dest: '.js-copy-dest',
            item: '.js-copy-item',
            add_btn:  '.js-add',
            remove_btn: '.js-remove'
        });
        /**
         * Init graphics
         */


        const defaultData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label               : 'label-item1',
                    data                : [65, 59, 80, 81, 56, 55, 40],
                },
                {
                    label               : 'label-item2',
                    data                : [28, 48, 40, 19, 86, 27, 90],
                }
            ]
        };


        let defaultGrafic = new Graphic({
            el: '.js_graphic-default',
            parent: '.js_graphic-parent',
            btnChangeType: '.js_graphic-change',
            type: 'line',
            descriptionBlk: '.js_graphic-description',
            options:{
                legend:{
                    display: false
                }
            },
            data: defaultData
        });
        defaultGrafic.init();

        let graficWithoutPointGrid = new Graphic({
            el: '.js_graphic-without-point-grid',
            parent: '.js_graphic-parent',
            btnChangeType: '.js_graphic-change',
            form: '.js_graphic-form',
            type: 'line',
            options: {
                scales:{
                    xAxes: [{
                        gridLines: {
                            display: false
                        },

                    }],
                    yAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            },
            data: defaultData,
            commonDatasets: {
                pointRadius: 0
            }
        });
        graficWithoutPointGrid.init();

        let defaultGrafic2 = new Graphic({
            el: '.js_graphic-default2',
            parent: '.js_graphic-parent',
            btnChangeType: '.js_graphic-change',
            type: 'line',
            data:  {
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

            },
            commonDatasets: {
                lineTension: 0
            },
            descriptionBlk: '.js_graphic-description',
        });
        defaultGrafic2.init();

        let graficBar = new Graphic({
            el : '.js_graphic-bar',
            parent: '.js_graphic-parent',
            btnChangeType: '.js_graphic-change',
            type: 'bar',
            data: defaultData,
            options: {
                scales:{
                    xAxes: [{
                        gridLines: {
                            display: true
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true
                        }
                    }]
                }
            }
        });
        graficBar.init();

    }
};     

/**
 * Simple action for creating
 * @type {{create_item_btns_init: Function, add_item: Function}}
 */

let item = {
    create: function() {
        location.reload();
    },

    delete: function(item_tag) {
        $(item_tag).remove();
    },

    create_btn_init: function(btn) {
        $('body').on('click', btn, function(e) {
            e.preventDefault();
            let action = $(this).data('action');

            let show_modal = function(content) {
                modals.withFrom(item.create, content);
            };

            controls.ajax_action(action, 'GET', show_modal);
        })
    },

    delete_btn_init: function(btn) {
        $('body').on('click', btn, function(event) {
            event.preventDefault();
            let action = $(this).data('request');
            let removing_item_tag = $(this).data('item');
            let method = $(this).data('method');

            method = typeof method !== 'undefined' ? method : 'POST';

            let remove_item = function() {
                item.delete(removing_item_tag);
            };

            let show_error = function() {
                $('.status').html(data.responseText);
            };

            let action_function = function() {
                controls.ajax_action(action, method, remove_item, show_error);
            };
            let languageSettings = {
                en:{
                     modalTtl: 'Confirm removal',
                     modaltCnt: 'The object will be deleted',
                     modalBtnTxt: 'Remove',
                     modalBtnCancelTxt : 'Cancel'
                },

                ru:{
                    modalTtl: 'Подтвердите удаление',
                    modaltCnt: 'Объект будет удален',
                    modalBtnTxt: 'Удалить',
                    modalBtnCancelTxt : 'Отмена'
                }
            };
            modals.base(action_function, languageSettings[app.locale].modalTtl, languageSettings[app.locale].modaltCnt, languageSettings[app.locale].modalBtnTxt, languageSettings[app.locale].modalBtnCancelTxt);
        })
    }
};


let controls = {
    //Send simple AJAX request
    ajax_action: function(action, method, success_function, error_function, data) {

        data += '&_token=' + app.csrf_token;
        console.log(data );

        if(method.toUpperCase() !== 'GET' && method.toUpperCase() != 'POST'){
            data += '&_method=' + method;
            method = 'POST';
        }

        $.ajax({
            url: action,
            method: method,
            data: data,
            success: function(data) {
                success_function(data);
            },
            error: function(data) {
                error_function(data.responseText);
            }
        })
    }
};



/*
Media library functions
 */

let media = {
    /**
     * Select image for removing
     * @param btn
     */
    select: function(btn) {
        $('body').on('click', btn, function(event) {
            event.preventDefault();
            $(this).parent().parent().parent().toggleClass('__active');
            media.showDeleteSelected();
        });
    },
    /*
    Send request on server to delete image
     */
    delete: function(){
        let itemForDelete = [];
        $('body').find('.media-item.__acitve').each(function(i,el){
            itemForDelete.push($(this).data('id'));
        })
    },
    /*
     Init btn for 1 image delete
     */
    deleteBtnInit: function(btn){
        $('body').on('click', btn, function(e){
            e.preventDefault();
            let id = $(this).data('id');
            media.delete(id);
        })
    },
    /*
    Init button to delete all selected imges
     */
    deleteSelectedInit: function(btn){
        $('body').on('click', btn, function(e){
            e.preventDefault();
            let itemForDelete = [];
            $('body').find('.media-item.__acitve').each(function(i,el){
                itemForDelete.push($(this).data('id'));
            });
            media.delete(itemForDelete);
        })
    },
    /*
    Upload new images
    */
    uploadPreview: function(el) {
        $(el).change(function(event) {
            let files = this.files;
            let container = $(this).parent().find('.media-preview-l');
            container.html('');
            $.each(files, function(index, val) {
                let image = new FileReader();
                image.onload = function(e) {
                   container.append('<li class="media-preview-i"><img src="'+e.target.result+'" alt=""></li>')
                };
                image.readAsDataURL(val);
            });
        });
    },
    checkAllBtnInit: function(btn){
        $('body').on('click', btn, function(e){
            e.preventDefault();
            console.log('click');
            $('body').find('.media-item').addClass('__active');
            media.showDeleteSelected();
        })
    },
    showDeleteSelected: function(){
        if ($('.media-item.__active').length > 0) {
            $('.js-delete-selected').slideDown();
        } else {
            $('.js-delete-selected').slideUp();
        }
    }
};
