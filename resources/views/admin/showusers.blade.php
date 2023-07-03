@include('admin.css')

@include('admin.sidebar')

    <div class="overlay"></div>

    <main class="main-wrapper">

@include('admin.navbar')



<div class="row">
    <div class="col-lg-10" style='margin:50px;'>
      <div class="card-style mb-30">
        <h6 class="mb-10">Users Table</h6>
        <p class="text-sm mb-20">

        </p>
        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><h6>name</h6></th>
                <th><h6>email</h6></th>
                <th><h6>Action</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>

                @foreach ($users as $user)
                    
              <tr>
                <td class="min-width">
                    <p>{{ $user->name }}</p>
                </td>
                <td class="min-width">
                    <p>{{ $user->email }}</p>
                </td>

                <td>
                  <div class="action">
                        
                    <a href='{{url('Delete_user' , $user->id)}}' class="text-danger">
                        <i class="lni lni-trash-can"></i>
                    </a>
                  </div>
                </td>
              </tr>

                @endforeach

            </tbody>
          </table>
          <!-- end table -->
        </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
  </div>

@include('admin.footer')