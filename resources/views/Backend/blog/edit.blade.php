
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
            <h5 class="card-title">Edit Blog</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="col-12">
                <label  class="form-label"> Title *</label>
                <input type="text" class="form-control"  name="title" value={{ $getRecord->title }} required >

              </div>
              <div class="col-12">
                <label  class="form-label" > Category *</label>
               <select class="form-control" name="category_id" required>
                <option value="">Select Category </option>
                @foreach ($getCategory as $value )
                <option {{ ($getRecord->category_id==$value->id)? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>


                @endforeach
               </select>

              </div>



              <div class="col-12">
                <label  class="form-label"> Image *</label>
                <input type="file" class="form-control"  name="image_file">

                @if(!empty($getRecord->getImage()))
                <img src="{{ $getRecord->getImage() }}" style="height: 70px ;  width: 70px;">
                @endif
              </div>



              <div class="col-12">
                <label  class="form-label"> Descritption*</label>
           <textarea class="form-control tinymce-editor"     name="description"  >{{ $getRecord->description }}</textarea>

              </div>


              <div class="col-12">
                @php
                $tags='';
                   foreach ($getRecord->getTag as $value )
                        {
                            $tags .= $value->name. ',';
                        }
                @endphp

                <label  class="form-label"> Tags *</label>
                <input type="text" class="form-control" value="{{ $tags }}" id="tags" name="tags" >

              </div>
             <hr>



              <div class="col-12">
                <label  class="form-label"> Meta description</label>
                <textarea class="form-control" name="meta_description">{{ $getRecord->meta_description }}</textarea>
                <div style="color:red">{{ $errors->first('meta_description') }}

              </div>
             <div class="col-12">
                <label  class="form-label"> Meta keywords</label>
                <input type="text" class="form-control" value="{{ $getRecord->meta_keywords }}" name="meta_keywords"  id="inputNanme4">
                <div style="color:red">{{ $errors->first('meta_keywords') }}

              </div>

            </hr>

            <div class="col-12">
                <label for="inputPassword4" class="form-label">Puplish *</label>
                <select class="form-control"name="is_puplish">
                    <option {{ ($getRecord->is_puplish==1)? 'selected' : '' }} value="1" >yes</option>
                    <option {{ ($getRecord->is_puplish==0)? 'selected' : '' }}  value="0" > No</option>
                </select>
              </div>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status *</label>
                <select class="form-control"name="status">
                    <option  {{ ($getRecord->status==0)? 'selected' : '' }} value="1" >Active</option>
                    <option  {{ ($getRecord->status==0)? 'selected' : '' }} value="0" > InActive</option>
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




