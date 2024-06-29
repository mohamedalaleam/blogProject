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
                        Blog List (Total::{{ $getRecord->total() }})
                        <a href="{{ url('panel/blog/add') }}" class="btn btn-primary no-print" style="float:right">Add New</a>
                        <button class="btn btn-secondary no-print" onclick="printDiv('printableArea')" style="float:right; margin-right: 10px;"><i class="bi bi-printer"></i></button>
                    </h5>
                    <form class="row no-print" accept="get">
                        <div class="col-md-1">
                            <label class="form-label">ID</label>
                            <input type="text" name="id" value="{{ Request::get('id') }}" class="form-control">
                        </div>
                        @if(Auth::user()->is_admin == 1)
                        <div class="col-md-2">
                            <label class="form-label">User Name</label>
                            <input type="text" name="username" value="{{ Request::get('username') }}" class="form-control">
                        </div>
                        @endif
                        <div class="col-md-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ Request::get('title') }}" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" value="{{ Request::get('category') }}" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Publish</label>
                            <select class="form-control" name="is_publish">
                                <option value="">Select</option>
                                <option {{ Request::get('is_publish') == 1 ? 'selected' : '' }} value="1">Yes</option>
                                <option {{ Request::get('is_publish') == 100 ? 'selected' : '' }} value="100">No</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select</option>
                                <option {{ Request::get('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                                <option {{ Request::get('status') == 100 ? 'selected' : '' }} value="100">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="margin-top: 20px">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" value="{{ Request::get('start_date') }}" class="form-control">
                        </div>
                        <div class="col-md-2" style="margin-top: 20px">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" value="{{ Request::get('end_date') }}" class="form-control">
                        </div>
                        <div class="col-md-2" style="margin-top: 20px">
                            <button type="submit" class="btn btn-primary" style="margin-top:30px">Search</button>
                            <a href="{{ url('panel/blog/list') }}" class="btn btn-secondary" style="margin-top:30px">Reset</a>
                        </div>
                    </form>
                    <hr />
                    <div id="printableArea">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    @if(Auth::user()->is_admin == 1)
                                    <th scope="col">User Name</th>
                                    @endif
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Publish</th>
                                    <th scope="col">Created Date</th>
                                    <th scope="col" class="no-print">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                <tr>
                                    <th scope="row">{{ $value->id }}</th>
                                    <td>
                                        @if(!empty($value->getImage()))
                                        <img src="{{ $value->getImage() }}" style="height: 70px; width: 70px;">
                                        @endif
                                    </td>
                                    @if(Auth::user()->is_admin == 1)
                                    <td>{{ $value->user_name }}</td>
                                    @endif
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>{{ !empty($value->status) ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ !empty($value->is_publish) ? 'Yes' : 'No' }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                    <td class="no-print">
                                        <a href="{{ url('panel/blog/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('panel/blog/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record Not Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
