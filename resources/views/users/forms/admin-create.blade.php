<form method="POST" action="user-store">
    @csrf
    <div class="row mb-4">
        <label for="name" class="col-form-label col-lg-2">User Name</label>
        <div class="col-lg-10">
            <input id="name"
                name="name"
                type="text"
                class="form-control"
                placeholder="Enter User Name..." >
        </div>
    </div>
    <div class="row mb-4">
        <label for="email" class="col-form-label col-lg-2">User e-mail</label>
        <div class="col-lg-10">
            <input id="email"
                name="email" type="text"
                class="form-control  @error('email') is-invalid @enderror"
                placeholder="Enter User E-mail..." >
        </div>
    </div>
    <div class="row mb-4">
        <label for="password" class="col-form-label col-lg-2">Password</label>
        <div class="col-lg-10">
            <input id="password" name="password" type="text" class="form-control"
                placeholder="Enter User Password..." >
        </div>
    </div>

    <input id="role_code" name="role_code" type="hidden" value="88">

    <div class="row justify-content-end">
        <div class="col-lg-10">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>