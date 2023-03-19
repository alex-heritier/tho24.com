<div style="display: flex; grid-gap: 14px">
    <span>Name: <b>{{ $user['name'] }}</b></span>
    <span>Email: <b onclick="{{ $onclick ?? '' }}">{{ $user->email }}</b></span>
    <span>Phone: <b>{{ '+'.$user['phone_code'].' '.$user['phone'] }}</b></span>
</div>