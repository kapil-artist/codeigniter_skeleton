<?php
$user_id = !empty($currentUser->user_id) ? $currentUser->user_id : '';
$first_name = !empty($currentUser->first_name) ? $currentUser->first_name : '';
$last_name = !empty($currentUser->last_name) ? $currentUser->last_name : '';
$email_id = !empty($currentUser->email_id) ? $currentUser->email_id : '';
$password = !empty($currentUser->password) ? $currentUser->password : '';

?>
<div class="row">
   <div class="col-md-12">
      <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url() ?>/admin/useradd?erd=1" method="POST">
         <div class="card ">
            <div class="card-body ">
               <div class="row">
                  <label class="col-sm-2 col-form-label">姓</label>
                  <div class="col-sm-3">
                     <div class="form-group bmd-form-group">
                        <input autocomplete="xyz123" value="<?php echo $last_name ?>" class="form-control" type="text" name="last_name" required="true" aria-required="true">
                     </div>
                  </div>
                  <label class="col-sm-2 col-form-label">姓</label>
                  <div class="col-sm-3">
                     <div class="form-group bmd-form-group">
                        <input autocomplete="xyz123" value="<?php echo $first_name ?>" class="form-control" type="text" name="first_name" required="true" aria-required="true">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <label class="col-sm-2 col-form-label">メールアドレス</label>
                  <div class="col-sm-8">
                     <div class="form-group bmd-form-group">
                        <input autocomplete="xyz123" value="<?php echo $email_id ?>" class="form-control" type="text" name="email_id" id="email_id"  email="true" required="true" aria-required="true">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <label class="col-sm-2 col-form-label">パスワード</label>
                  <div class="col-sm-8">
                     <div class="form-group bmd-form-group">
                        <input autocomplete="xyz123" value="<?php echo $password ?>" class="form-control" type="password" name="password" required="true" aria-required="true">
                        <input type="hidden" name="editid" value="<?php echo $user_id ?>">
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
               <?php if (!empty($user_id)) {
                  $text = "アップデート";
               } else {
                  $text = "作成";
               }
               ?>
               <button type="button" onclick="checkvalidation()" class="btn btn-rose"><?php echo $text ?></button>
            </div>
         </div>
      </form>
   </div>
</div>
<script>
   function setFormValidation(id) {
      $(id).validate({
         highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
         },
         success: function(element) {
            $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
         },
         errorPlacement: function(error, element) {
            $(element).closest('.form-group').append(error);
         },
      });
   }

   function checkvalidation() {
      if (!document.forms["TypeValidation"].checkValidity()) {
         document.forms["TypeValidation"].reportValidity();
         return false;
      }
      var email = $("#email_id").val();
      let user_id = '<?php echo !empty($user_id)?$user_id:''; ?>';
      $.ajax({
         url: '<?php echo base_url() ?>/admin/checkemail?email='+email+"&user_id="+user_id,
         method: 'POST',
         data: {},
         success: function(res) {
            if (res !== 'success') {
               alert("Email already exists");
            }
            else {
               $("#TypeValidation").submit();
            }
         },
         error: function(err) {
            console.log('Error ', err);
         }
      });
   }
</script>