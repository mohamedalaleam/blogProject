
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
            <h5 class="card-title">Add New Blog</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="col-12">
                <label  class="form-label"> Title *</label>
                <input type="text" class="form-control"  name="title"  required >

              </div>
              <div class="col-12">
                <label  class="form-label" > Category *</label>
               <select class="form-control" name="category_id" required>
                <option value="">Select Category </option>
                @foreach ($getCategory as $value )
                <option value="{{ $value->id }}">{{ $value->name }}</option>


                @endforeach
               </select>

              </div>



              <div class="col-12">
                <label  class="form-label"> Image *</label>
                <input type="file" class="form-control"  name="image_file"  required >


              </div>



              <div class="col-12">
                <label  class="form-label"> Descritption*</label>
           <textarea class="form-control tinymce-editor" name="description"></textarea>

              </div>


              <div class="col-12">
                <label  class="form-label"> Tags *</label>
                <input type="text"  id="tags" class="form-control" data-role="tagsinput" name="tags" >

              </div>
             <hr>



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
                <label for="inputPassword4" class="form-label">Puplish *</label>
                <select class="form-control"name="is_puplish">
                    <option value="1" >yes</option>
                    <option value="0" > No</option>
                </select>
              </div>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status *</label>
                <select class="form-control"name="status">
                    <option value="1" >Active</option>
                    <option value="0" > InActive</option>
                </select>
              </div>

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






