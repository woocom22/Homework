@extends('admin.layouts.master')
@section('content')
    <div class="pagetitle">
      <h1>Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Category</h5>

              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('category.update') }}" novalidate>
                @csrf
                <input type="hidden" value="{{ $model->id }}" name="id">
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">Category name</label>
                  <input type="text" class="form-control" value="{{ $model->name; }}" placeholder="Type Category Name" id="validationCustom01" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">State</label>
                    <select class="form-select" name="status" id="validationCustom04" required>
                      <option selected disabled value="">Choose Status</option>
                      <option {{ $model->status == 'active'?'selected':'' }} value="active">Active</option>
                      <option {{ $model->status == 'inactive'?'selected':'' }} value="inactive">Inactive</option>
                    </select>

                  </div>

                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>


      </div>
    </section>

  </main><!-- End #main -->
@endsection
