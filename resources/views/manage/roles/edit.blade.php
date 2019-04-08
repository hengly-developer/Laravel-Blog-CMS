@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <form class="" action="{{ route('roles.update', $role->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="columns m-t-10">
          <div class="column">
            <h1 class="title">Edit {{ $role->display_name }}</h1>
          </div>
          <div class="column">
            <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i>Edit this Roles</a>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h1 class="title">Role Detail</h1>
                    <div class="field">
                      <div class="control">
                        <label for="display_name" class="label">Name (Human Readable)</label>
                        <input type="text" class="input" name="display_name" value="{{ $role->display_name }}" id="display_name">
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <label for="name" class="label">Slug (Can't be edit)</label>
                        <input type="text" class="input" name="name" value="{{ $role->name }}" disabled>
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <label for="description" class="label">Description</label>
                        <input type="text" class="input" name="description" value="{{ $role->description }}" id="description" name="description">
                      </div>
                    </div>
                    <input type="hidden" name="permissions" :value="permissionsSelected">
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h1 class="title">Permission: </h1>
                    <ul>
                      @foreach($permissions as $permission)
                        <div class="field">
                          <b-checkbox v-model="permissionsSelected" native-value="{{ $permission->id }}">
                            {{ $permission->display_name }}<em>({{ $permission->description }})</em>
                          </b-checkbox>
                        </div>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </article>
            </div>
            <button type="submit" class="button is-primary">Save Changes to Role</button>
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
        permissionsSelected: {!! $role->permissions->pluck('id') !!}
      }
    })
  </script>
@endsection
