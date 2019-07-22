<p>Имя, Фамилия: {{ $data['name'] }}</p>
<p>Телефон: {{ $data['phone'] }}</p>
<p>Email: {{ $data['email'] }}</p>
@if($data['match'])
    <p>{{ $data['match'] }}</p>
@endif
