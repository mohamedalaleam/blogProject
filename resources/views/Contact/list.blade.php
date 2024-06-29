
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
            contact List
            </h5>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col"> Subject </th>
                  <th scope="col">Message</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                @forelse ($getContact as $value )
                <tr>

                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->subject }}</td>
                    <td>{{ $value->message }}</td>

                    <td>
                        <a onclick="return confirm('are you sure you want delete record');" href="{{ url('panel/contact/delete/'.$value->id) }}"  class="btn btn-danger" ><i class="bi bi-trash"></i></a>

                    </td>


                  @empty
                </tr>
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






