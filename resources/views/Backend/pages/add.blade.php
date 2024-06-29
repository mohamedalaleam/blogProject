
@extends('Backend.layouts.app')
@section('style')

<link rel="stylesheet" type="text/css" href="{{ url('public/assets/tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('content')


<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Page</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}



              <div class="col-12">
                <label  class="form-label"> Slug *</label>
                <input type="text" class="form-control"  name="slug"  required >

              </div>

              <div class="col-12">
                <label  class="form-label"> Title *</label>
                <input type="text" class="form-control"  name="title"  required >

              </div>
              
              <div class="col-12">
                <label  class="form-label"> Descritption*</label>
           <textarea class="form-control tinymce-editor" name="description"></textarea>

              </div>

             <hr>


             <div class="col-12">
                <label  class="form-label"> Meta Title</label>
                <input type="text" class="form-control"  name="meta_title"  id="inputNanme4">
              </div>


              <div class="col-12">
                <label  class="form-label"> Meta description</label>
                <textarea class="form-control" name="meta_description"></textarea>

              </div>
             <div class="col-12">
                <label  class="form-label"> Meta keywords</label>
                <input type="text" class="form-control"  name="meta_keywords"  id="inputNanme4">
              </div>

            </hr>


              <div class="col-12" style="margin-top: 30px">
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

    <script src="{{ url('public/assets/tagsinput/bootstrap-tagsinput.js') }}"></script>

    <script type="text/javascript">
            $("#tags").tagsinput();
    </script>

@endsection






