@extends('Backend.layouts.app')

@section('style')
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('Layouts._messages')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Category List
                        <a href="{{ url('panel/category/add') }}" class="btn btn-primary no-print" style="float:right">add new</a>
                        <button class="btn btn-secondary no-print" onclick="printDiv('printableArea')" style="float:right; margin-right: 10px;"><i class="bi bi-printer"></i></button>
                    </h5>

                    <div id="printableArea">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Meta Title</th>
                                    <th scope="col">Meta Description</th>
                                    <th scope="col">Meta keywords</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created Date</th>
                                    <th scope="col" class="no-print">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value )
                                <tr>
                                    <th scope="row">{{ $value->id }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->slug }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->meta_title }}</td>
                                    <td>{{ $value->meta_description}}</td>
                                    <td>{{ $value->meta_keywords}}</td>
                                    <td>{{ !empty($value->is_menu) ? 'Yes' : 'No' }}</td>
                                    <td>{{ !empty($value->status) ? 'active' : 'Inactive' }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    <td class="no-print">
                                        <a href="{{ url('panel/category/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm('are you sure you want delete record');" href="{{ url('panel/category/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record Not Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection
