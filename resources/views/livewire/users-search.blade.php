<div class="col-md-6">
    <form method="get" action="{{ route('user.userSearch') }}">
        <div class="input-group">
          <label class="sr-only">Search</label>
          <div class="input-group">
            <input wire:model.debounce.500ms="usersSearch" type="text" name="searchKey" class="form-control" placeholder="Search">
            <div wire:loading class="clearfix position-absolute">
            <div class="spinner-grow text-info float-right" role="status">
              <span class="sr-only">Loading...</span>
           </div>
          </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">
                <span class="fas fa-search"></span></button>
            </div>
          </div>
        </div>
    </form>
    @if (strlen($usersSearch) > 1)
      @if (count($users) > 0)
      <div class="list-group col-md-11 position-absolute" style="z-index:1">
      @foreach ($users as $user)
            <a href="{{url('/users')}}/{{$user->id}}/edit" class="list-group-item list-group-item-action"> {{ $user->name }} <span class="badge badge-primary badge-pill">{{ $user->email }}</span> </a>
      @endforeach
      @else
      <a href"#" class="list-group-item list-group-item-action position-absolute disabled" style="z-index:1"> No Results for {{ $usersSearch }} </a>
      @endif
      </div>
      @endif
</div>
