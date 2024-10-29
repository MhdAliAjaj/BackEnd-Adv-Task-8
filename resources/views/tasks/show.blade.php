@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">تفاصيل المهمة</h2>
                </div>

                <div class="card-body">
                    <p><strong>العنوان:</strong> {{ $task->title }}</p>
                    <p><strong>الوصف:</strong> {{ $task->description }}</p>
                    <p><strong>تاريخ الاستحقاق:</strong> {{ $task->due_date }}</p>
                    <p><strong>الحالة:</strong>
                        @if ($task->status == 'Pending')
                            <span class="badge badge-warning">معلقة</span>
                        @else
                            <span class="badge badge-success">مكتملة</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection