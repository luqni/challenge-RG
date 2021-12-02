
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marketing Campaign</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>3</h3>

                <p>Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>4</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact Person</th>
                    <th>Contact Number</th>
                    <th>Delivery Address</th>
                    <th>Gift</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($pelanggans as $pelanggan)
                    <td>{{$pelanggan->user_id}}</td>
                    <td>{{$pelanggan->user_name}}</td>
                    <td>{{$pelanggan->email}}</td>
                    <td>{{$pelanggan->contact_person}}</td>
                    <td>{{$pelanggan->contact_number}}</td>
                    <td>{{$pelanggan->delivery_address}}</td>
                    <td>{{$pelanggan->gift}}</td>
                    <td>{{$pelanggan->status}}</td>
                    <td><a href="#">
                            <button type="button" class="open-AddBookDialog btn btn-success" id="myBtn" data-toggle="modal" data-id="{{$pelanggan->id}}" data-user_name="{{$pelanggan->user_name}}" data-package_tag="{{$pelanggan->package_tag}}" 
                            data-gift="{{$pelanggan->gift}}" data-status="{{$pelanggan->status}}">
                                                {{ __('Update') }}
                            </button>
                        </a>
                    </td>
                    
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact Person</th>
                    <th>Contact Number</th>
                    <th>Delivery Address</th>
                    <th>Gift</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- The Modal -->
<div id="myModal" class="modal">
<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <h2 align="center">Update Status</h2>
  
  <input type="hidden" name="id" id="id" value=""/>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="user_name" id="user_name" value="" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Package Name</label>
    <input type="text" class="form-control" name="package_tag" id="package_tag" value="" value="" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Gift</label>
    <input type="text" class="form-control" name="gift" id="gift" value="" value="" disabled>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select class="custom-select form-control-border" id="status">
      <option value="created">Created</option>
      <option value="delivery">Delivery</option>
      <option value="rejected">Rejected</option>
    </select>
  </div>
  <div class="card-footer">
      <button type="submit" id="modal-submit" class="btn btn-info">Update</button>
    </div>
</div>

</div>