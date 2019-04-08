@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <form class="" action="{{ route('roles.store') }}" method="post">
        {{ csrf_field() }}
        <div class="columns m-t-10">
          <div class="column">
            <h1 class="title">Create New Role</h1>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h1 class="title">New Role</h1>
                    <div class="field">
                      <div class="control">
                        <label for="display_name" class="label">Name (Human Readable)</label>
                        <input type="text" class="input" name="display_name" value="{{ old('display_name') }}" id="display_name">
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <label for="name" class="label">Slug (Can't be Changed)</label>
                        <input type="text" class="input" name="name" value="{{ old('name') }}">
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <label for="description" class="label">Description</label>
                        <input type="text" class="input" name="description" value="{{ old('description') }}" id="description" name="description">
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
            <button type="submit" class="button is-primary">Create new User</button>
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
        permissionsSelected: []
      }
    })
  </script>
@endsection
