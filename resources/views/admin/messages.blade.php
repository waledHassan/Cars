<base href="/public">
@include('admin.css')

@include('admin.sidebar')

    <div class="overlay"></div>

    <main class="main-wrapper">

@include('admin.navbar')



<div class="row text-center">
  <div class="col-lg-12" style='margin-top:50px;'>
    <div class="card-style mb-30">
        <h6 class="mb-10">Messages Table</h6>
        <p class="text-sm mb-20">
        </p>
        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><h6>Name</h6></th>
                <th><h6>Email</h6></th>
                <th><h6>Phone</h6></th>
                <th><h6>Message</h6></th>
                <th><h6>Action</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>

                @forelse ($messages as $message)
                    
              <tr>
          
    
                <td class="min-width">
                  <p>{{ $message->name }}</p>
                </td>
                <td class="min-width">
                  <p>{{ $message->email }}</p>
                </td>
                <td class="min-width">
                    <p>{{ $message->phone }}</p>
                  </td>
                  <td class="min-width">
                    <p>{{ $message->message }}</p>
                  </td>
                <td>
                  <div class="action">
                    <a onclick="return confirm('Are You Sure To Delete This !!!')" href='{{url('DleteMessage' , $message->id)}}' class="text-danger">
                        <i class="lni lni-trash-can"></i>
                    </a>
                  </div>
                </td>
              </tr>

              @empty
                   <td class="text-center" colspan="16">No Data Fount</td>

                @endforelse

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