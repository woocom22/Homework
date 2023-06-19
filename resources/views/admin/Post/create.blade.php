@extends('admin.layouts.master')
@push('style')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endpush

@section('content')
    <div class="pagetitle">
      <h1>Posts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Posts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Post</h5>

              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" enctype="multipart/form-data" method="post" action="{{ route('posts.store') }}" novalidate>
                @csrf
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">Post Title</label>
                  <input type="text" class="form-control" placeholder="Type Post Title" id="validationCustom01" name="title" required>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">Post Category</label>
                 <select name="category_id" id="" class="form-control">
                    <option value="" id="">select Category</option>
                        @foreach ($models as $item)
                            <option value="{{ $item->id}}">{{ $item->name }}</option>
                        @endforeach
                 </select>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Post Photo</label>
                    <input type="file" class="form-control" id="validationCustom01" name="photo" required>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Status</label>
                    <select class="form-select" name="status" id="validationCustom04" required>
                      <option selected disabled value="">Choose Status</option>
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>

                  </div>
                  <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
                  <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Description</label>
                    <textarea name="description" class="form-control summernote" id="" cols="30" rows="10"></textarea>
                  </div>

                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Create</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>


      </div>
    </section>

  </main><!-- End #main -->
@endsection

@push('script')
<script type="text/javascript">

    $(document).ready(function() {

      $('.summernote').summernote();

    });

</script>
@endpush
