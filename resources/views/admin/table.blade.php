@extends('layouts.admin')

@section('content')




        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Responsive example<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Role</th>
                          <th>Poste</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Etat</th>
                          <th>Supprimer</th>                          
                        </tr>
                      </thead>
                      <tbody>

                @foreach ($users as $user)
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->poste}}</td>
                          <td>{{$user->tel}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                          @if ($user->etat == 1)
                          <a href="{{ route('changetat', ['id' => $user->id ]) }}" class="btn btn btn-warning">Desactive</a>
                          @else
                          <a href="{{ route('changetat', ['id' => $user->id ]) }}" class="btn btn-primary">Active</a>
                          @endif
                          </td>
                          <td><a href="{{ route('supprimeuser', ['id' => $user->id ]) }}" class="btn btn-danger">Supprimer</a></td>
                          
                        </tr>
                @endforeach
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

@endsection
