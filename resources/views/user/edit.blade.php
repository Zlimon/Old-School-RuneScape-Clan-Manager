@extends('layouts.layout')

@section('title')
    Edit user
@endsection

@section('content')
    <script>
        function checkRadio() {
            document.getElementById("icon-select").checked = true;
        }

        function fillText() {
            var iconId = document.querySelector('input[name = "icon_id"]:checked').value;
            document.getElementById("icon-text").value = iconId;
        }
    </script>

    <div class="col-md-12 bg-dark text-light background-dialog-panel py-3 mb-3">
        <h1 class="text-center header-chatbox-sword">{{ $user->name }}</h1>

        <form method="POST" action="{{ route('user-update') }}">
            @method('PATCH')
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Profile name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ $user->name }}" autocomplete="name" aria-describedby="nameTip" autofocus required>
                    <small id="nameTip" class="form-text text-muted">Your profile name displayed on this site. Not OSRS
                        account.</small>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ $user->email }}" autocomplete="email" required>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="private" class="col-md-4 col-form-label text-md-right">Private</label>

                <div class="col-md-6">
                    <div class="form-check form-check-inline">
                        <div class="icon-radio">
                            <label class="icon-radio">
                                <input type="radio" name="private" id="privateFalse" value="0">
                                <img src="{{ asset('images/friend.png') }}"
                                     alt="Happy face"
                                     title="Click here to show your account to everyone">
                            </label>

                            <label class="icon-radio">
                                <input type="radio" name="private" id="privateTrue" value="1">
                                <img src="{{ asset('images/ignore.png') }}"
                                     alt="Sad face"
                                     title="Click here to hide your account for everyone">
                                <span>
									Currently:

									@if ($user->private === 0)
                                        <img src="{{ asset('images/friend.png') }}"
                                             alt="Happy face"
                                             title="Currently NOT private">
                                    @else
                                        <img src="{{ asset('images/ignore.png') }}"
                                             alt="Sad face"
                                             title="Currently private">
                                    @endif
								</span>
                            </label>
                        </div>

                        @error('private')
                        <span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Current profile icon</label>

                <div class="col-md-6">
                    <label class="icon-radio">
                        <input type="radio" name="icon_id" id="icon_id" value="{{ $user->icon_id }}"
                               onclick="fillText()" checked>
                        <img src="https://www.osrsbox.com/osrsbox-db/items-icons/{{ $user->icon_id }}.png"
                             alt="Current profile icon"
                             title="Click here to keep using your current profile icon">
                        <span>ID: {{ $user->icon_id }}</span>
                    </label>
                </div>
            </div>

            <div class="form-group row">
                <label for="icon_id" class="col-md-4 col-form-label text-md-right">Profile icon ID</label>

                <div class="col-md-6">
                    <div class="icon-radio">
                        <input class="icon-select" type="radio" name="icon_id" id="icon-select"
                               value="{{ $user->icon_id }}">
                    </div>

                    <input id="icon-text" type="text"
                           class="icon-text form-control @error('icon_id') is-invalid @enderror" name="icon_id"
                           value="{{ old('icon_id', $user->icon_id) }}" aria-describedby="icon_idTip"
                           onfocus="checkRadio()">
                    <small id="icon_idTip" class="form-text text-muted">
                        Type in the ID of an icon you wish to display as your profile icon. Search icons
                        <a target="_blank" rel="noopener noreferrer" href="https://www.osrsbox.com/tools/item-search/">here</a>
                    </small>

                    @error('icon_id')
                    <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="icon_id" class="col-md-4 col-form-label text-md-right">or pick a random icon</label>

                <div class="col-md-6">
                    @foreach ($randomIcons as $icon)
                        <label class="icon-radio">
                            <input type="radio" name="icon_id" id="icon_id" value="{{ $icon }}" onclick="fillText()">
                            <img src="https://www.osrsbox.com/osrsbox-db/items-icons/{{ $icon }}.png"
                                 alt="Random icon"
                                 title="Click here to use this as your profile icon">
                        </label>
                    @endforeach

                    @error('icon_id')
                    <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
