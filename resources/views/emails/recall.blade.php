<p>ФИО: {{ $data['name'] }}</p>
<p>Телефон: {{ $data['phone'] }}</p>
@if($data['message'])
    <p>Удобное время звонка: {{ $data['time'] }}</p>
@endif
@if($data['message'])
    <p>Комментарий: {{ $data['message'] }}</p>
@endif
