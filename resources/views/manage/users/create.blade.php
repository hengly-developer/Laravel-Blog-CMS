@extends('layouts.manage')

@section('content')
<div class="flex-container">
  <div class="columns m-t-10">
    <div class="column">
      <h1 class="title">Create Users</h1>
    </div>
  </div>
  <div class="columns">
    <div class="column">
      <form class="" action="{{ route('users.store') }}" method="post">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="field">
          <label for="name" class="label">Name</label>
          <div class="control">
            <input class="input" type="text" name="name" id="name" placeholder="Name">
          </div>
        </div>
        <div class="field">
          <label for="name" class="label">Email</label>
          <div class="control">
            <input class="input" type="email" name="email" id="email" placeholder="Email">
          </div>
        </div>
        <div class="field">
          <label for="name" class="label">Password</label>
          <div class="control">
            <input class="input" type="password" name="password" id="password" v-if="!auto_password" placeholder="Password">
            <b-checkbox name="auto_generate" class="m-t-15" :checked="true" v-model="auto_password">Auto Generate Password</b-checkbox>
          </div>
        </div>
        <button type="submit" class="button is-success">Create User</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
      var app = new Vue({
        el: '#app',
        data: {
          auto_password: true
        }
      });
  </script>
@endsection
