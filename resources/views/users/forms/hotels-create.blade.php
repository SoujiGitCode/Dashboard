<form method="POST" action="user-store">
    @csrf
    <div class="row mb-4">
        <label for="name" class="col-form-label col-lg-2">Name</label>
        <div class="col-lg-10">
            <input id="name"
                name="name"
                type="text"
                class="form-control"
                placeholder="Enter User Name..." >
        </div>
    </div>
    <div class="row mb-4">
        <label for="rooms" class="col-form-label col-lg-2">Max Rooms</label>
        <div class="col-lg-10">
            <input id="email"
                name="email" type="text"
                class="form-control  @error('email') is-invalid @enderror"
                placeholder="Enter Max Rooms..." >
        </div>
    </div>
    <div class="row mb-4">
        <label for="status" class="col-form-label col-lg-2">Status</label>
        <div class="col-lg-10">
            <input id="password" name="password" type="text" class="form-control"
                placeholder="Status..." >
        </div>
    </div>


    <div class="row justify-content-end">
        <div class="col-lg-10">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>