@foreach ($users as $user)
    @include('user/partial/show', ['user' => $user])
@endforeach