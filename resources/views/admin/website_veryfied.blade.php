<!doctype html>
<html>
<head>
<title>
    Web Site Verfication
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
        .jumbotron p{
            text-align: !important justify;
            font-size: !important 12px;
        }
        .heading{
            
            font-weight: bolder;
        }
    </style>
</head>
<body>

<div class="jumbotron">
    <div class="container">
<div class="text-center">
  <h1 class="heading">Website Verified</h1>
</div><br>
  <div class="row">
    <div class="col-sm-6 text-right">
    <img src="http://localhost/team-leader/public/award/logo/IIFA Award-1626327382.jpg" id="award_logo" alt="Award Logo">
    </div>
    <div class="col-sm-6 text-left">
     <p class="paragraph">We, at British Service Awards, recognises <span class="bussiness_name"></span> to meet our quality standard <a style="text-decoration:none" href="https://britishserviceawards.co.uk">britishserviceawards.co.uk</a></p>
    <p class="paragraph">According to our records,  <span class="bussiness_name"></span> operates the website <span id="bussiness_link"></span></p>
    </div>
    </div>
    <div class="row">
     <div class="col-sm-12 text-right" style="margin-top:40px;">
<a id="HyperLinkDomain" class="btn btn-info" href="">RETURN TO VERIFIED WEBSITE</a>
</div>
    </div>
    <hr>
   <div class="row">
    
        <h3 class="heading">Verified By British Service Awards</h3><br>
        <p class="paragraph">You deserve only the best! That’s it! We have verified businesses that achieve excellence. We look at a wide range of factors to verify this. </p>
    
</div>
    </div>
  </div>
<script>
$(document).ready(function(){
 var param = getUrlVars();
if(param['logo'] !=undefined){
let logo = window.atob(param['logo']);
$("#award_logo").attr('src',logo);	
}
if(param['bussiness'] !=undefined){
let bussiness = window.atob(param['bussiness']);
$(".bussiness_name").html(bussiness);	
}
if(param['web'] !=undefined){
let web = window.atob(param['web']);
	var link = '<a href="'+web+'" style="text-decoration:none;">'+web+'</a>';
    $("#bussiness_link").html(link);
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