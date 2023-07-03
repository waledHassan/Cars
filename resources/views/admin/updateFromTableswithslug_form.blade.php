@include('admin.css')

@include('admin.sidebar')

    <div class="overlay"></div>

    <main class="main-wrapper">

@include('admin.navbar')

       <form action="{{url('doUpdateFromTablesWithSlug' , $table= $table)}}?id={{$data->id}}" method='POST'>
          @csrf
        <div class="col-lg-10 mt-8" style='margin-left:100px;'>
            <div class="card-style mb-30">
            <h6 class="mb-25">Add Data</h6>

            <div class="input-style-1">
                <label>Name</label>
                <input value="{{$data->name_en}}" type="text" name='name' placeholder="Name" required='require'/>
            </div>

            <div class="input-style-1">
                <label style='text-align:right;'>الاسم</label>
                <input type="text" value="{{$data->name_ar}}" name='name_ar' style='text-align:right;' placeholder="الاسم" required='require'/>
            </div>

            <div class="input-style-1">
                 <button class='btn btn-primary'>Add</button>
            </div>
         </div>
        </div>
      </form>

@include('admin.footer')