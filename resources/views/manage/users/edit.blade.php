@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Users</h1>
      </div>
    </div>
    <form class="" action="{{ route('users.update', $user->id) }}" method="post">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="columns">
    <div class="column">
        <div class="field">
          <label for="name" class="label">Name</label>
          <div class="control">
            <input class="input" type="text" name="name" id="name" value="{{ $user->name }}">
          </div>
        </div>
        <div class="field">
          <label for="name" class="label">Email</label>
          <div class="control">
            <input class="input" type="email" name="email" id="email" value="{{ $user->email }}">
          </div>
        </div>
        <div class="field">
          <label for="password" class="label">Password</label>
            <div class="field">
              <b-radio v-model="password_options" native-value="keep">Do Not Change Password</b-radio>
            </div>
            <div class="field">
              <b-radio v-model="password_options" native-value="auto">Auto-Generate New Password</b-radio>
            </div>
            <div class="field">
              <b-radio v-model="password_options" native-value="manual">Manually Set New Password</b-radio>
              <div class="control">
                <input class="input" type="password" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manual Password">
                <!-- <input class="input" type="password" name="password" id="password" placeholder="Manual Password"> -->
              </div>
            </div>
        </div>
    </div>
    <div class="column">
      <label for="roles" class="label">Roles:</label>
      <input type="hidden" name="roles" :value="roleSelected">
      @foreach($roles as $role)
        <div class="field">
          <div class="control">
            <b-checkbox v-model="roleSelected" :native-value="{{ $role->id }}">{{ $role->display_name }}</b-checkbox>
          </div>
        </div>
      @endforeach
    </div>
  </div>
      <div class="columns">
        <div class="column">
          <hr>
          <button type="submit" class="button is-primary is-pulled-right" style="width:250px;">Edit User</button>
        </div>
      </div>
    </form>
</div>
@endsection

@section('scripts')
  <script>
      var app = new Vue({
        el: '#app',
        data: {
          password_options: 'keep',
          roleSelected: {!! $user->roles->pluck('id') !!}
        }
      })
  </script>
@endsection
