<!doctype html>
<html>
<head>
<title>
    Web Site Not Veryfied
</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="colorlib" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{
            background:url('http://localhost/team-leader/public/award/logo/red-glitter-sand-texture-on-black-abstract-backgro-PATLLXH.jpg') no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
              color:white; 
        }
        .heading{
            
            font-weight: bolder;
            font-size:72px;
        }
        .bussiness_name{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="row">
    <br>
    <div class="container-fluid">
<div class="col-md-5 text-left" style="padding-top:200px">
  <h1 class="heading">Website Not Verified</h1>
    <br>
    <div class="text-right">
    <a id="entity_web" class="btn btn-info" href="">RETURN TO <span id="entity_name"></span></a>
    </div>    
    </div>
    </div>
  </div>
<script>
$(document).ready(function(){
 var param = getUrlVars();

if(param['entity'] != undefined){
let entity = window.atob(param['entity']);
    $("#entity_name").html(entity);
}
if(param['entity_web'] != undefined){
let entityWeb = window.atob(param['entity_web']);
    $("#entity_web").attr('href',entityWeb);
}
});
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

</script>
</body>
</html>
