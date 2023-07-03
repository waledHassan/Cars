@include('admin.css')

@include('admin.sidebar')

    <div class="overlay"></div>

    <main class="main-wrapper">

@include('admin.navbar')


<div class="row">
    <div class="col-lg-11" style='margin:50px 0px 0 0 ;'>
      <div class="card-style mb-30">
        <a href="{{url('addProduct_form')}}" class="btn btn-outline-primary mb-2">Add</a>
        <h6 class="mb-10">Products Table</h6>
        <p class="text-sm mb-20">

        </p>
        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><h6>Name</h6></th>
                <th><h6>Price</h6></th>
                <th><h6>Category</h6></th>
                <th><h6>Approve</h6></th>
                <th><h6>Update</h6></th>
                <th><h6>delete</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>

                @foreach ($products as $product)
                @foreach ($specifications as $specification)
                    @if ($specification->product_id == $product->id)
                        
              <tr>
                <td class="min-width">
                  <div class="lead">
                    <div class="lead-image">
                      <img
                        src="productimage/{{ $product->image }}"
                        alt=""
                      />
                    </div>
                    <div class="lead-text">
                      <a href="{{url('updateproduct',$product->id)}}">
                        <p>{{ $product->name_en }}</p>
                      </a>
                    </div>
                  </div>
                </td>
                <td class="min-width">
                  <p>{{ $product->price }}</p>
                </td>
                <td class="min-width">
                  {{ $product->category }}
                </td>

                <td class="min-width">
                @if ($product->approve == 0)
                    <a href="{{url('approveproduct' , $product->id)}}" class='btn btn-primary'>Approve</a>
                    @endif
                  </td>
                  <td class="min-width">
                      <a href="{{url('updateproduct' , $product->id)}}" class='btn btn-primary'>Update</a>
                  </td>
                <td>
                  <div class="action">
                    <a onclick="return confirm('Are You Sure')" href='{{url('deleteproduct' , $product->id)}}' class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </a>
                  </div>
                </td>
              </tr>

                @endif
                @endforeach
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