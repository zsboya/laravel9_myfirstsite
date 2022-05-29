<ul>
    {{--
    <?php foreach($tasks as $task) : ?>
      <li><?= $task; ?></li>
    <?php endforeach; ?>
    --}}
    {{ $taskname }}
    <hr>
    @foreach($tasks as $task)
      <li>{{ $task }}</li>
    @endforeach
</ul>
