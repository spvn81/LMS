function delete_table_data(id, url_data, color = '') {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: url_data,
        data: 'id=' + id,
        success: function(data) {

            if (data.success == 'deleted') {
                $('#' + id).remove();
                var html = `<div class="alert alert-` + color + `  alert-dismissible fade show text-capitalize" role="alert">
                <strong>` + data.msg + `<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>`
                $(".msg").html(html)

                setTimeout(function() {
                    $(".msg").html('')
                }, 3000)

            }
        }

    })


}




function delete_table_data_with_method(id, url_data, color = '',method) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: method,
        url: url_data,
        data: 'id=' + id,
        success: function(data) {

            if (data.message == 'deleted') {
                location.reload();
            }
        }

    })


}
