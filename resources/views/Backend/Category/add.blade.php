
@extends('Backend.layouts.app')
@section('style')
@endsection
@section('content')


<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Category</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field() }}
              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Name *</label>
                <input type="text" class="form-control"  name="name"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('name') }}

              </div>

              <div class="col-12">
                <label  class="form-label"> Title *</label>
                <input type="text" class="form-control"  name="title"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('title') }}

              </div>
             <hr>
             <div class="col-12">
                <label  class="form-label"> Meta Title *</label>
                <input type="text" class="form-control"  name="meta_title"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('meta_title') }}

              </div>


              <div class="col-12">
                <label  class="form-label"> Meta description</label>
                <textarea class="form-control" name="meta_description"></textarea>
                <div style="color:red">{{ $errors->first('meta_description') }}

              </div>
             <div class="col-12">
                <label  class="form-label"> Meta keywords</label>
                <input type="text" class="form-control"  name="meta_keywords"  id="inputNanme4">
                <div style="color:red">{{ $errors->first('meta_keywords') }}

              </div>

            </hr>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Menu</label>
                <select class="form-control"name="is_menu">
                    <option value="0" >No</option>
                    <option value="1" >Yes</option>
                </select>
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






