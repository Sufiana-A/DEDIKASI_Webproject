<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
	<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet" type="text/css"/>	
	<link href="/stylesheets/sb-admin-2.css" rel="stylesheet" type="text/css"/>
	<link href="/stylesheets/circle-buttons.css" rel="stylesheet" type="text/css"/>
	<link href="/stylesheets/panel-table.css" rel="stylesheet" type="text/css"/>
	<link href="/stylesheets/main.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>	
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.js"></script>	
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.3/angular.js"></script>	
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.3/ui-bootstrap-tpls.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.3/ui-bootstrap-tpls.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.3/ui-bootstrap.js"></script>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 ml-auto mr-auto">
        <div class="col-xs-4 col-md-offset-2">
          <div class="panel panel-default panel-info Profile">
            <div class="panel-heading"> My Profile </div>
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Profile successfully saved
            </div>
            <div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Oops!</strong> Profile not saved. Try later.
            </div>
            <div class="panel-body">
              <div class="form-horizontal">
                    <form>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="text" name="firstName"
                                        value="First Name" ng-model="me.firstName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="text" name="lastName"
                                        value="Last Name" ng-model="me.lastName">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Jurusan</label>
                                <div>
                                    <select name="opsi_jurusan" class="form-control">
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                        <option value="Teknik Industri">Teknik Industri</option>
                                        <option value="Teknik Logistik">Teknik Logistik</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-sm-2 control-label">NIM</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="number" name="nim"
                                            value="1202201920">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-sm-2 control-label">Angkatan</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="text" name="angkatan"
                                            placeholder="2021" ng-model="me.email">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-sm-2 control-label">Jurusan</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="text" name="jurusan"
                                            value="Sistem Informasi">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                        <input class="form-control" type="text" name="phone"
                                            placeholder="xxx-xxx-xxxx" ng-model="me.email">
                                </div>
                            </div>          
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 mt-3">
                                        <button class="btn btn-primary" ng-click="updateMe()">Update</button>
                                </div>
                            </div>
                    </form>
                </div>  <!-- end form-horizontal -->
            </div> <!-- end panel-body -->
      
          </div> <!-- end panel -->
          
      
        </div> <!-- end size -->
      </div> <!-- end container-fluid -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
