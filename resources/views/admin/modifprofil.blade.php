@extends('layouts.admin')

@section('content')




        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  

                    <form class="form-horizontal form-label-left" method="POST" action="{{ route('modifprofil') }}" novalidate>

                      </p>
                      <span class="section">Personal Info</span>
                      @if(session()->has('message'))
                  <div class="alert alert-success">
                   {{ session()->get('message') }}
                  </div>
                  @endif

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="{{$user->name}}" data-validate-length-range="6" name="nom" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="role">
                            <option value="">....</option>

                            @if ($user->role =="utilisteur" )
                            <option value="utilisteur" selected>Utilisteur</option>
                            <option value="technicien">technicien</option>
                            <option value="superviseur" >super viseur</option>
                            @elseif ($user->role =="technicien" )
                            <option value="utilisteur" >Utilisteur</option>
                            <option value="technicien" selected>technicien</option>
                            <option value="superviseur" >super viseur</option>
                            @elseif ($user->role =="superviseur" )
                            <option value="utilisteur" >Utilisteur</option>
                            <option value="technicien">technicien</option>
                            <option value="superviseur" selected >super viseur</option>
                            @else
                            <option value="admin" selected >Admin</option>
                            <option value="utilisteur" >Utilisteur</option>
                            <option value="technicien">technicien</option>
                            <option value="superviseur" >super viseur</option>
                            @endif

                        </select>

                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Poste <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="poste">
                            @if ($user->poste =="utilisteur" )
                            <option value="utilisteur" selected>Utilisteur</option>
                            <option value="technicien">technicien</option>
                            <option value="superviseur" >super viseur</option>
                            @elseif ($user->poste =="technicien" )
                            <option value="utilisteur" >Utilisteur</option>
                            <option value="technicien" selected>technicien</option>
                            <option value="superviseur" >super viseur</option>
                            @elseif ($user->poste =="superviseur" )
                            <option value="utilisteur" >Utilisteur</option>
                            <option value="technicien">technicien</option>
                            <option value="superviseur" selected >super viseur</option>
                            @else
                            <option value="admin" selected >Admin</option>
                            <option value="utilisteur" >Utilisteur</option>
                            <option value="technicien">technicien</option>
                            <option value="superviseur" >super viseur</option>
                            @endif

                        </select>

                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="{{$user->tel}}" data-validate-length-range="6" name="tel" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email2" name="email" value="{{$user->email}}"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Modifier</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection
