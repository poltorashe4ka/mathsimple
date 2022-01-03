$(document).ready(function () {

//     $('button[type=submit]').click(function(){
//         // tinymce.triggerSave();
//     });

    $('.datetimepicker:not([readonly])').datetimepicker({
        locale: 'ru',
        format: 'DD.MM.YYYY HH:mm:ss'
    });

    $('.datepicker:not([readonly])').datetimepicker({
        locale: 'ru',
        format: 'DD.MM.YYYY'
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     *
     * @param type string 'insertAfter' or 'insertBefore'
     * @param entityName
     * @param id
     * @param positionId
     */
    var changePosition = function(requestData){
        $.ajax({
            'url': '/admin/sort',
            'type': 'POST',
            'data': requestData,
            'success': function(data) {
                if (data.success) {
                    console.log('Saved!');
                } else {
                    console.error(data.errors);
                }
            },
            'error': function(){
                console.error('Something wrong!');
            }
        });
    };


    var $sortableTable = $('.sortable');
    if ($sortableTable.length > 0) {
        $sortableTable.sortable({
            handle: '.sortable-handle',
            axis: 'y',
            update: function(a, b){

                var entityName = $(this).data('entityname');
                var $sorted = b.item;

                var $previous = $sorted.prev();
                var $next = $sorted.next();

                if ($previous.length > 0) {
                    changePosition({
                        parentId: $sorted.data('parentid'),
                        type: 'moveAfter',
                        entityName: entityName,
                        id: $sorted.data('itemid'),
                        positionEntityId: $previous.data('itemid')
                    });
                } else if ($next.length > 0) {
                    changePosition({
                        parentId: $sorted.data('parentid'),
                        type: 'moveBefore',
                        entityName: entityName,
                        id: $sorted.data('itemid'),
                        positionEntityId: $next.data('itemid')
                    });
                } else {
                    console.error('Something wrong!');
                }
            },
            cursor: "move"
        });
    }

    $('#selectBrand').change(function(){
        var id = $(this).val();

        if(id){
            $.ajax({
                url: '/admin/catalog_item/models/'+id,
                dataType: 'html',
                success: function(data){
                    $('#selectModel').html(data);
                }
            });
        }else{
            $('#selectModel').html('');
        }
    });

    $('#choose-car-type input').on('change', function(){
        if($(this).val() == 'catalog') {
            $('.car-manual-field').hide().find('input').removeAttr('required');
            $('.car-catalog-field').show().find('select').attr('required', true);
        }
        else {
            $('.car-manual-field').show().find('input').attr('required', true);
            $('.car-catalog-field').hide().find('select').removeAttr('required');
        }
    });
});
