<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="admin_app">
      <!-- nombre de checkbox -->
      <div class="form-group">
      <div v-for="field in fields">

      <input type="text" placeholder="Nombre del Checkbox" class="form-control" v-model="field.label">  
   
</div></div>
    <!-- respuesta checkbox -->
    <div class="input-group">
      <textarea
        type="text"
        placeholder="Respuesta..."
        class="form-control"
        v-model="name"></textarea>
      <div class="input-group-btn">
        <button class="btn btn-success" @click="addRow">Add</button>
        <button class="btn btn-danger" @click="delRow">Del</button>
      </div>
    </div><br />
    <button class="btn btn-success" @click="pushFields">Guardar</button>
                                <div class="hr-line-dashed"></div>    
</div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>