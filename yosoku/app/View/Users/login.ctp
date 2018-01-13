<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
	  <div class="form_title" style="margin : 20px;" >
		  <h1>Login</h1>

	  </div>
  </div>
  <div class="col-md-3">
  </div>

</div>
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
	<div class="posts form" style="margin : 20px;">
		<?php echo $this->Form->create('User'); ?>
		<legend></legend>
		<div class="form-group">
		<label for="name">Name</label>
		<input name="data[User][username]" id="name" type="text" class="form-control" />
		</div>
		<div class="form-group">
		<label for="name">password</label>
		<br />
		<input name="data[User][password]" id="name" type="password" class="form-control" />
		</div>
		<div class="actions" style="margin : 20px;">
		<button class="btn btn-primary">Submit</button>
		</div>
	</div>
  </div>
  <div class="col-md-3">
  </div>

</div>

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-9"  >
  </div>
</div>

