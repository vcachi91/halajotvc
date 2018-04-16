<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halajot - <?php echo $__env->yieldContent('title'); ?> </title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/css/ui.jqgrid.css" />
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/summernote.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/summernote-bs.css'); ?>" />

</head>
<body style="background:white!important">

  <!-- Wrapper-->
    <div id="wrapper">
        <!-- Page wraper -->
        <div>
            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

        
        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>    

<script>
    $(document).ready(function(){
        $(".chosen-select").chosen()
    });
</script>
<script>
    $(document).ready(function(){
    $('#show').click(function() {
      $('#bloque_general').toggle("slide");
    });
});
</script>
<script>
var respuestasInfo = <?php !empty($lista_info) ? print(json_encode($lista_info)) : print('"0"') ?>;
</script>
<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js" type="text/javascript"></script>
<script src="<?php echo asset('js/admin_form.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('js/editar.js'); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo asset('js/summernote.min.js'); ?>" type="text/javascript"></script>
<script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
    </script>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
