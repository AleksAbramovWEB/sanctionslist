<script type="text/javascript">


    function mainAjax($obg){
        $.ajax({url: document.location.href, type: 'POST', data: ($obg)
        })
        .done(function(data) {
            $(".dataTables_scroll").html(data);
        });
    }


    $(".dataTables_scroll").on('click', '#tablepress-1_next', function (){
        if ($(this).hasClass("disabled")) return;
        let search = $('#tablepress-1_filter').val();
        let until_sdn = $(this).attr('data-until');
        mainAjax({until_sdn:until_sdn, search:search})
    });

    $(".dataTables_scroll").on('click', '#tablepress-1_previous', function (){
        if ($(this).hasClass("disabled")) return;
        let search = $('#tablepress-1_filter').val();
        let from_sdn = $(this).attr('data-from');
        mainAjax({from_sdn:from_sdn, search:search})
    });

    $('#tablepress-1_filter').on('input', function(){
        let search = $('#tablepress-1_filter').val();
        mainAjax({search:search})
    });

    $(".dataTables_scroll").on('click', '.sdn_title', function (){
        let sdnInfo = $(this).siblings(".sdn_info");

        if ($(sdnInfo).hasClass("sdn_hidden")){
            $(sdnInfo).removeClass("sdn_hidden");
        }else {
            $(sdnInfo).addClass("sdn_hidden");
        }
    });





</script>
