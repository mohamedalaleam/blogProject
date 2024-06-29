
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
            <h5 class="card-title">
            Page List
                <a href="{{ url('panel/page/add') }}" class="btn btn-primary " style="float:right">add new </a>
            </h5>

            <table class="table table-striped">
              <thead>

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Title</th>
                  <th scope="col">meta Title</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($getRecord as $value )
                <tr>

                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->slug }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->meta_title}}</td>
                    <td>{{ date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                    <td>
                    <a href="{{ url('panel/page/edit/'.$value->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

                    </td>


                </tr>
                @empty
                <tr>
                <td colspan="100%">Record Not Found</td>
                </tr>
                @endforelse

              </tbody>
            </table>

            <!-- End Table with stripped rows -->


        </div>


        </div>


      </div>
    </div>
  </section>



    @endsection
    @section('script')
      @endsection






