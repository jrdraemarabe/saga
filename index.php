
<html>
<head>
	<title>ULTRA</title>
	<link href="style.css" rel="stylesheet" id="bootstrap-css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
body {
  background-image: url('saga901.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
</head>
<body text=red>
	<br>
      <center> <div class="row col-md-7">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<div class="card col-sm-8">
  <center><h6 <center><span class="badge badge-dark rainbow_text_animated "><h4>𝓣𝓗𝓔</h1></span>
  <center><h6 <center><span class="badge badge-dark rainbow_text_animated "><h3>𝓟𝓘𝓡𝓐𝓣𝓔 𝓚𝓘𝓝𝓖</h1></span>
  <center><h6 <center><span class="badge badge-dark rainbow_text_animated "><h1>𝓜𝓸𝓷𝓴𝓮𝔂 𝓓. 𝓛𝓾𝓯𝓯𝔂</h1></span>
</h6><center>
  <div class="card">
<div class="md-form">
  <div class="col-md-12">
<center>  <div class="md-form">
    <span style="color:#5cb85c">𝘾𝙑𝙑 ✔️:</span>&nbsp<span id="cLive" class="badge badge-success">0</span>
    <span style="color:#f0ad4e">𝘾𝘾𝙉 ✔️:</span>&nbsp<span id="cWarn" class="badge badge-warning">0</span>
    <span style="color:#d9534f">𝘿𝙚𝙘𝙡𝙞𝙣𝙚𝙙 ✘:</span>&nbsp<span id="cDie" class="badge badge-danger">0</span>
    <span style="color:#5bc0de">𝘾𝙝𝙚𝙘𝙠𝙚𝙙:</span>&nbsp<span id="total" class="badge badge-info">0</span>
    <span>𝙏𝙤𝙩𝙖𝙡:</span>&nbsp<span id="carregadas" class="badge badge-light">0</span>
</div><br><textarea type="text" style="text-align: center; border-color: #00FF00; background-color: rgba(255, 255, 255, .1); color: white; maxlength="700" 
placeholder="Enter Cards Here";" id="lista" class="md-textarea form-control" rows="4" placeholder="Enter Cards"></textarea>
 </center>
&nbsp;<br>
</div>
<center>
 <button class="btn btn-warning rainbow_text_animated" style="width: 150px; outline: none;" id="testar" onclick="enviar()" ><b>START</b></button></center>
</center>
</div>
</div>
</cenetr>
&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>
<div class="col-md-4">
<div class="card">
<div style="position: absolute;
        top: 0;
        right: 0;">
  <button id="mostra" class="btn btn-success rainbow_text_animated"><b>Sʜᴏᴡ</b></button><br>
    </div>
  <div style="position: absolute;
  top: 0;
  left: 0;">
</div>
  <div class="card-">
    <center><h10 style="font-weight: bold;color:#5cb85c" class="card-title">CVV ✔️ <span  id="cLive2" class="badge badge-success">0</span></h10></center>
    <div id="bode"><span id=".aprovadas" class="aprovadas"></span>
</div>
  </div>
</div>
</div>
&nbsp;&nbsp;&nbsp;</br>

<div class="col-md-4">
<div class="card">
<div style="position: absolute;
        top: 0;
        right: 0;">
  <button id="mostra3" class="btn btn-warning rainbow_text_animated"><b>Sʜᴏᴡ</b></button><br>
    </div>
  <div style="position: absolute;
  top: 0;
  left: 0;">
</div>
  <div class="card-">
    <center><h6 style="font-weight: bold;color:yellow;" class="card-title">CCN ✔️ <span  id="cWarn2" class="badge badge-warning">0</span></h6></center>
    <div id="bode3"><span id=".edrovadas" class="edrovadas"></span>
</div>
  </div>
</div>
</div>
&nbsp;&nbsp;&nbsp;</br>

<div class="col-md-4">
<div class="card">
  <div style="position: absolute;
        top: 0;
        right: 0;">
  <button id="mostra2" class="btn btn-danger rainbow_text_animated"><b>Sʜᴏᴡ</b></button><br>
  </div>
  <div style="position: absolute;
  top: 0;
  left: 0;">
</div>
  <div class="card-">

    <center><h6 style="font-weight: bold; color: red;" class="card-title">DIE ✘ <span id="cDie2" class="badge badge-danger">0</span></h6></center>
    <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
    </div>
  </div>
</div>
</div>
  </div>
</div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

</div>
<br>
</center>
<script  src="./script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){

  $("#bode").hide();
  $("#esconde").show();
  
  $('#mostra').click(function(){
  $("#bode").slideToggle();
  });
  
  $('#mostra3').click(function(){
  $("#bode3").slideToggle();
  });
  
   $('#mostra2').click(function(){
  $("#bode2").slideToggle();
  });

});

</script>

<script title="ajax do checker">
    function enviar() {
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var ap = 0;
        var ed = 0;
        var rp = 0;
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
                    $.ajax({
                        url: 'api.php?lista=' + value,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("#Approved")) {
                                removelinha();
                                ap++;
                                aprovadas(resultado + "");
                            }else if(resultado.match("#Approve")){
                            	removelinha();
                            ed++;
                                edrovadas(resultado + "");
                             }else {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(ed) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cWarn').html(ed);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
                            $('#cLive2').html(ap);
                            $('#cWarn2').html(ed);
                            $('#cDie2').html(rp);
                        }
                    });
                }, 1000 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function edrovadas(str) {
        $(".edrovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>
<style>
.rainbow_text_animated {
    background: linear-gradient(to right, #6666ff, #0099ff , #00ff00, #ff3399, #6666ff);
    border-color: #00FF00;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: rainbow_animation 2s ease-in-out infinite;
    background-size: 400% 100%;
}

@keyframes rainbow_animation {
    0%,100% {
        background-position: 0 0;
    }

    50% {
        background-position: 100% 0;
    }
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
<footer>
    <center><h4><span class="badge badge-dark rainbow_text_animated ">𝐄𝐍𝐉𝐎𝐘 𝐅𝐎𝐑 𝐂𝐇𝐄𝐂𝐊𝐈𝐍𝐆</h4></span>
</footer>
</body>
<!-- Edited By @sa -->
</html>
