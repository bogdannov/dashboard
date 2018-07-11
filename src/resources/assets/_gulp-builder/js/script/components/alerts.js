/**
 * Use for show alerts
 *
 * @type {{success: Function, error: Function}}
 */
export let alerts = {
    /**
     * Show success alert
     * @param title
     * @param txt
     */
    success: function(title, txt) {
        var el = $('.alert-section');

        // var alertHtml = '<div class="alert alert-success alert-dismissible"> ' +
        //     '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">' +
        //     '<i class="icon fa fa-close"></i>' +
        //     '</button> ' +
        //     '<h4 class="ttl">' +
        //     '<i class="icon fa fa-check"></i>' + title +
        //     '</h4> ' +
        //     '<span class="txt">' + txt + '</span> ' +
        //     '</div>';

        var alertHtml = '<div class="box box-success box-solid ">' +
                '<div class="box-header with-border">' +
                    '<i class="fa fa-check margin-r-5"></i>'+
                    '<h3 class="box-title "></h3>' +
                    '<div class="box-tools pull-right ">'+
                        '<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>'+
                    '</div>'+
                '</div>'+
                '<div class="box-body">' + txt +
                '</div>' +
            '</div>';

        var alertItem = el.append(alertHtml);
        $('.alert-success').slideDown();
        setTimeout(function() {
            $('.alert-success').first().slideUp(500, function() {
                $(this).remove();
            });
        }, 3000)
    },
    /**
     * Show error alert
     * @param title
     * @param txt
     */
    error: function(title, txt) {
        var el = $('.alert-section');
        // var alertHtml = '<div class="alert alert-danger alert-dismissible"> ' +
        //     '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">' +
        //     '<i class="icon fa fa-close"></i>' +
        //     '</button> ' +
        //     '<h4 class="ttl">' +
        //     '<i class="icon fa fa-ban"></i>' + title +
        //     '</h4> ' +
        //     '<span class="txt">' + txt + '</span> ' +
        //     '</div>';

        var alertHtml = '<div class="box box-danger box-solid">' +
            '<div class="box-header with-border">' +
                '<i class="fa fa-ban margin-r-5"></i>' +
                '<h3 class="box-title">' + title + '</h3>' +
                '<div class="box-tools pull-right">' +
                    '<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>' +
                '</div>' +
            '</div>' +
            '<div class="box-body">' + txt +
            '</div>'+
        '</div>';

        var alertItem = el.append(alertHtml);
        $('.alert-danger').slideDown();
    }

    
};