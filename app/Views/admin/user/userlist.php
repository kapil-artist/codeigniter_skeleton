<?php 
//pe($allusers) 
   ?>
<div class="card">
   <div class="card-body">
      <div class="toolbar">        
      </div>
      <div class="material-datatables">
         <?php if (empty($allusersHeader)) {
            echo '<h2>No records found</h2>';
            } ?>
         <?php if (!empty($allusersHeader)) : ?>
         <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
               <tr>
                  <?php foreach ($allusersHeader as $value) : ?>
                  <th><?php echo $value ?></th>
                  <?php endforeach; ?>
                  <th class="disabled-sorting text-right">Action</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <?php foreach ($allusersHeader as $value) : ?>
                  <th><?php echo $value ?></th>
                  <?php endforeach; ?>
                  <th class="text-right">Action</th>
               </tr>
            </tfoot>
            <tbody>
               <?php foreach ($allusers as $value) : ?>
               <tr>
                  <?php foreach ($value as $datadisplay) : ?>
                  <td><?php echo $datadisplay ?></td>
                  <?php endforeach; ?>
                  <td class="text-right">
                     <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">edit</i></a>
                     <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
         <?php endif; ?>
      </div>
   </div>
   <!-- end content-->
</div>
<script src="<?php echo base_url() ?>/assets/admin/js/datatabletrigger.js?time=<?php echo time() ?>"></script>
<script>
   function editIconClicked(id) {
       window.location = "<?php echo base_url() ?>/admin/useradd?editid=" + id;
   }
   
   function deleteIconClicked(id) {
       window.location = "<?php echo base_url() ?>/admin/userdelete?deleteid=" + id;
   }
</script>