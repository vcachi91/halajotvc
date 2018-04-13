<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="admin_app">
      <!-- nombre de checkbox -->
      <div class="form-group">
      <input type="text" placeholder="Nombre del Checkbox" id="nombre" class="form-control" v-model="nombre">  
   </div>
    <button class="btn btn-success" @click="guardar">Guardar</button>
                                <div class="hr-line-dashed"></div>    
                                <div class="table-responsive">
                                <div class="NoRecords text-center lead"></div>
                        <!-- the grid table -->
                        <table class="table" id="checkboxList"></table>
                        <!-- pager definition -->
                        <div id="pager"></div>	
                        </div>

</div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>