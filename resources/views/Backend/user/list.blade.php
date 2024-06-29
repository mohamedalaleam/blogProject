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
                        User List
                        <a href="{{ url('panel/user/add') }}" class="btn btn-primary no-print" style="float:right">add new</a>
                        <button class="btn btn-secondary no-print" onclick="printDiv('printableArea')" style="float:right; margin-right: 10px;"><i class="bi bi-printer"></i></button>
                    </h5>

                    <div id="printableArea">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Email verified</th>
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
                                    <td>{{ $value->email }}</td>
                                    <td>{{ !empty($value->email_verified_at ) ? 'Yes' : 'No' }}</td>
                                    <td>{{ !empty($value->status ) ? 'active' : 'Inactive' }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    <td class="no-print">
                                        <a href="{{ url('panel/user/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm('are you sure you want delete record');" href="{{ url('panel/user/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

@section('script')<script>
    function printDiv(divId) {
        // 1. يتم الحصول على محتويات العنصر المراد طباعته بواسطة معرفه
    var printContents = document.getElementById(divId).innerHTML;
        // 2. يتم حفظ المحتويات الأصلية للصفحة
    var originalContents = document.body.innerHTML;

        // 3. تعيين محتويات الصفحة لتكون محتويات العنصر المراد طباعته
        document.body.innerHTML = printContents;

        // 4. استدعاء دالة الطباعة المدمجة في النافذة
        window.print();

        // 5. يُعيد الكود محتويات الصفحة إلى الحالة الأصلية بعد الطباعة
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
