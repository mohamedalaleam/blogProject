
@extends('Backend.layouts.app')
@section('style')
@endsection
@section('content')


<section class="section">
    <div class="row">

      <div class="col-lg-12">
@include('Layouts._messages')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Change Password</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field() }}
              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Old Password</label>
                <input type="password" class="form-control"  name="old_password"  required id="inputNanme4">

              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label" style="margin-top: 5px">New Password</label>
                <input type="password" class="form-control"  name="new_password" required id="inputEmail4">

              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label" style="margin-top: 5px"> Confirm Password</label>
                <input type="password" required name="confirm_password" class="form-control" id="inputPassword4">

              </div>


              <div class="col-12">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Update</button>
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






