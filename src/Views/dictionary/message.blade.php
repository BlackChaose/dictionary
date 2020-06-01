<b>Результат операции:</b>
@if($result_code === 'ok')
    <p class="text-success bg-light d-flex justify-content-center border border-success border-1">Ok! {{$result}}</p>
@elseif($result_code ==='error')
    <p class="text-danger bg-light d-flex justify-content-center border border-danger border-1">Error! {{$result}}</p>
@else
    <p class="text-warning bg-light d-flex justify-content-center border border-warning border-1">Warning! Operation's result undefined! {{$result}}</p>
@endif
