
@extends('Backend.layouts.app')
@section('style')
@endsection
@section('content')


<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New User</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field() }}
              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Name</label>
                <input type="text" class="form-control"  name="name"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('name') }}

              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control"  name="email" required id="inputEmail4">
                <div style="color:red">{{ $errors->first('email') }}

              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" required name="password" class="form-control" id="inputPassword4">
                <div style="color:red">{{ $errors->first('password') }}

              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status</label>
                <select class="form-control"name="status">
                    <option value="1" >Active</option>
                    <option value="0" > InActive</option>
                </select>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- Vertical Form -->

          </div>
        </div>


      </div>
    </div>
  </section>


    @endsection
    @section('script')
@endsection






