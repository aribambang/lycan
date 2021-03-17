@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	<div class="container-full">
		<section class="content">
		  <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Update User</h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col">
              <form method="post" action="{{ route('users.update', $editData->id) }}">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Role <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <select name="role" id="role" required class="form-control">
                              <option value="" selected disabled>Select Role</option>
                              <option value="admin" {{ ($editData->role == 'admin' ? 'selected' : '') }}>Admin</option>
                              <option value="user" {{ ($editData->role == 'user' ? 'selected' : '') }}>User</option>
                            </select>
                          </div>
                        </div>					
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Name <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="text" name="name" class="form-control" value="{{ $editData->name }}" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Email <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="text" name="email" class="form-control" value="{{ $editData->email }}" required>
                          </div>
                        </div>	
                      </div>
                      <div class="col-md-6">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" />
                </div>
              </form>
            </div>
          </div>
        </div>
		  </div>
		</section>
	</div>
</div>

@endsection