<h1>مهامك المعلقة</h1>

<ul>
    @foreach ($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong>
            <br>
            {{ $task->description }}
            <br>
            تاريخ الاستحقاق: {{ $task->due_date }}
        </li>
    @endforeach
</ul>