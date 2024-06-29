
@extends('Backend.layouts.app')
@section('style')
@endsection
@section('content')


<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Category</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field() }}
              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Name *</label>
                <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('name') }}

              </div>

              <div class="col-12">
                <label  class="form-label"> Title *</label>
                <input type="text" class="form-control" value="{{ $getRecord->title }}"  name="title"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('title') }}

              </div>
             <hr>
             <div class="col-12">
                <label  class="form-label"> Meta Title *</label>
                <input type="text" class="form-control" value="{{ $getRecord->meta_title }}" name="meta_title"  required id="inputNanme4">
                <div style="color:red">{{ $errors->first('meta_title') }}

              </div>


              <div class="col-12">
                <label  class="form-label"> Meta description</label>
                <textarea class="form-control" value="{{ $getRecord->meta_description }}" name="meta_description"></textarea>
                <div style="color:red">{{ $errors->first('meta_description') }}

              </div>
             <div class="col-12">
                <label  class="form-label"> Meta keywords</label>
                <input type="text" class="form-control" value="{{ $getRecord->meta_keywords }}" name="meta_keywords"  id="inputNanme4">
                <div style="color:red">{{ $errors->first('meta_keywords') }}

              </div>

            </hr>

            <div class="col-12">
                <label for="inputPassword4" class="form-label">Menu</label>
                <select class="form-control"name="is_menu">
                    <option  {{ ($getRecord->is_menu == 0)  ? 'selected' : '' }} value="0" >No</option>
                    <option  {{ ($getRecord->is_menu == 1)  ? 'selected' : '' }} value="1" >Yes</option>
                </select>
              </div>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status *</label>
                <select class="form-control"  name="status">
                    <option {{ ($getRecord->status == 1)  ? 'selected' : '' }}  value="1" >Active</option>
                    <option {{ ($getRecord->status == 0)  ? 'selected' : '' }} value="0" > InActive</option>
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






