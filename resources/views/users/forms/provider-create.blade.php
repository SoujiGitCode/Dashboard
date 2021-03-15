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
    <div class="row mb-4">
        <label for="projectbudget" class="col-form-label col-lg-2">Planes</label>
        <div class="col-lg-10">
            <select class="form-select" name="plan_id" id="plan_id">
                @foreach($plans as $plan) <option value="{{$plan->id}}" >{{$plan->name}}</option> @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-4" id="max_hotels_container" style="display:none;">
        <label for="max_hotels" class="col-form-label col-lg-2">Cantidad max de hoteles</label>
        <div class="col-lg-10">
            <input id="max_hotels" name="max_hotels" type="number" class="form-control"
                placeholder="Enter max hotels" >
        </div>
    </div>

    <div class="row mb-4" id="max_users_container" style="display:none;">
        <label for="max_users" class="col-form-label col-lg-2">Cantidad max de usuarios</label>
        <div class="col-lg-10">
            <input id="max_users" name="max_users" type="number" class="form-control"
                placeholder="Enter max users..." >
        </div>
    </div>

    <div class="row mb-4">
        <label for="description" class="col-form-label col-lg-2">Descripcion</label>
        <div class="col-lg-10">
            <input id="description" name="description" type="textarea" class="form-control"
                placeholder="Enter User Description..." >
        </div>
    </div>

    <input id="role_code" name="role_code" type="hidden" value="77">

    <div class="row justify-content-end">
        <div class="col-lg-10">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>



