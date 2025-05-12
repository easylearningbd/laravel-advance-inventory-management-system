@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Role In Permission</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item active">Role In Permission</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Role In Permission</h5>
                    </div><!-- end card header -->

<div class="card-body">
    <form action="{{ route('role.permission.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Role Name </label>
            <select name="role_id" class="form-select" id="example-select">
                <option value="" selected>Select Role</option>
                 @foreach ($roles as $role) 
                <option value="{{ $role->id }}">{{ $role->name }}</option> 
                  @endforeach
            </select>
        </div> 

    <div class="form-check mb-2">
    <input class="form-check-input" type="checkbox" id="formCheck1">
    <label class="form-check-label" for="formCheck1">
     Permission All 
    </label>
    </div>

    <hr>
    @foreach ($permission_groups as $group)
    <div class="row">
        <div class="col-3">
     <div class="form-check mb-2">
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
     {{ $group->group_name }}
    </label>
    </div> 
        </div>


  <div class="col-9">
    @php
        $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
    @endphp

    @foreach ($permissions as $permission) 
     <div class="form-check mb-2">
    <input class="form-check-input" name="permission[]" value="{{ $permission->id }}" type="checkbox" id="flexCheckDefault{{ $permission->id }}">
    <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">
     {{ $permission->name }}
    </label>
    </div> 
     @endforeach
     <br> 

      </div>  
    </div> 
    {{-- // End Row --}}
        
    @endforeach
         
        
            
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Save Change</button>
        </div>
    </form>
</div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->

          
        </div>

        

    </div> <!-- container-fluid -->

</div>
 
<script>
    $('#formCheck1').click(function(){
        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true)
        }else {
             $('input[type=checkbox]').prop('checked',false)
        }
    })
</script>

@endsection