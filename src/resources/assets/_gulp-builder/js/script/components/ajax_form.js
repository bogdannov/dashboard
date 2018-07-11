/**
 *  Use for send form data with ajax
 *
 *  Possible to send 1 or more files
 *  For all files attribute name will be added ordinal number
 *
 * @type {{submit_init: Function}}
 */

import { alerts } from './alerts.js'

//todo Move functionality to different functions
export let ajax_form = {

    languageSettings:{
        en:{
          error: 'Error',
          success: 'Done'
        },

        ru:{
            error: 'Ошибка',
            success: 'Данные успешно сохранены'
        }
    },

    submit_init: function(form) {
        $('body').on('submit', form, function(e) {
            e.preventDefault();
            var form = this;
            var method = ($(form).attr('method') == undefined ? "POST" : $(form).attr('method'));
            var action = ($(form).attr('action') == undefined ? "" : $(form).attr('action'));
            var result_block = $(form).data('result') == undefined ? '' : $(form).data('result');

            var success = function(data) {
                alerts.success('', ajax_form.languageSettings[app.locale].success);
                $('.form-group').removeClass('has-error');
                $('.help-block').html('');
                if(result_block !== ''){
                    $(result_block).html(data);
                }
            };

            var error = function(data) {
                $('.form-group').removeClass('has-error');
                $('.help-block').html('');
                var error_msg = [];

                if(!data.responseJSON && !data.responseJSON.errors){
                    alerts.error(ajax_form.languageSettings[app.locale].error);
                }

                $.each(data.responseJSON.errors, function(i, el) {
                    validation_input(i, el);
                    if(el) {
                        error_msg.push(el + '</br>');
                    }
                });

                alerts.error(data.responseJSON.message, error_msg);

                if(result_block !== ''){
                    $(result_block).html(data);
                }
            };

            var validation_input = function(el, txt){
                $('[name=' + el +']').closest('.form-group').addClass('has-error');
                $('[name=' + el +']').after('<p class="help-block">'+txt+'</p>');
            };

            var files = $(form).find('input[type="file"]');

            //Use simple sending method when not using files
            if(files.length < 0){
                var data = $(form).serialize();
                controls.ajax_action(action, method, succees, error, data);
                return;
            }

            //Use when need send files
            var data = new FormData();
            $.each(files, function(i, input){
                if(input.files.length > 0){
                    $.each(input.files, function(i, file){

                        let inputName = $(input).data('file-name');

                        if(inputName){
                            data.append(inputName + i, file);
                            $('[name=' + inputName + '_update]').val('true');
                            return ;
                        }

                        data.append(input.name + i, file);
                        $('[name=' + input.name + '_update]').val('true');

                    })
                }
            });

            $.each($(form).find('input:not([type=checkbox]), select, textarea'), function(i, el) {
                var id = $(el).attr('name');
                var value = $(el).val();
                data.append(id, value);
            });

            $.each($(form).find('input[type=checkbox]'), function(i, el){
            	var id = $(el).attr('name');
                var value = $(el).prop("checked") ? 1 : 0;
            	data.append(id, value);
            });

            console.log(data);
            $.ajax({
                url: action,
                method: method,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    success(data);
                },
                error: function(data) {
                    error(data);
                }
            })
        })
    }
};

export let Submit_transfer = function(classForClick, classForChange){
    this.eventClick = classForClick;
    this.eventChange = classForChange;

    this.init = function(){
        var clickSel = this.eventClick ;
        var changeSEl = this.eventChange ;

        $('body').on('click', clickSel, function(){
                var form = $(this).data('form');
                $(form).submit();
        });
        $('body').on('change', changeSEl, function(){
                var form = $(this).data('form');
                 $(form).submit();
        });
    }

    this.init()
};