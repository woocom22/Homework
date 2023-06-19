
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('category.index') }}">
              <i class="bi bi-circle"></i><span>All Category</span>
            </a>
          </li>
          <li>
            <a href="{{ route('category.create') }}">
              <i class="bi bi-circle"></i><span>Add Category</span>
            </a>
          </li>
        </ul>
      </li>

      {{-- Posts --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav-posts" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Posts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav-posts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('posts.index') }}">
              <i class="bi bi-circle"></i><span>All Posts</span>
            </a>
          </li>
          <li>
            <a href="{{ route('posts.create') }}">
              <i class="bi bi-circle"></i><span>Add Post</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Forms Nav -->

    </ul>

  </aside><!-- End Sidebar-->
