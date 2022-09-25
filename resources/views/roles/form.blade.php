<div class="row row-sm">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">roles Form</h4>
            </div>
            <x-flash-massage />
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body pt-0">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name' , $role->name)}}"
                        class="form-control @error('name')  is-invalid @enderror" />
                    @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_name">user_name</label>
                    <input type="text" id="user_name" name="user_name" value="{{ old('user_name' , $user->name)}}"
                        class="form-control @error('user_name')  is-invalid @enderror" />
                    @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" id="email" name="email"  value="{{ old('email' , $user->email)}}"
                        class="form-control @error('email')  is-invalid @enderror" />
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" id="password" name="password" value="{{ old('password' , $user->password)}}"
                        class="form-control @error('password')  is-invalid @enderror" />
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group" style="margin-left: 20px; margin-right: 20px;">
                    @foreach (config('permission') as $permissions => $label)
                    <input class="form-check-input" style="display: block;" type="checkbox" value="{{ $permissions }}"
                        name="permissions[]" @if(in_array($permissions , ($role->permissions ?? []))) checked @endif>
                    <label class="form-check-label" style="display: block;" for="flexCheckChecked">
                        {{ $label }}
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>