<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		

		<title>Отправка</title>
	</head>
	<body>
  <!-- <script src="script.js"></script> -->
  <style>
    #main{
      margin: auto;
      margin-top: 10%;
      background-color:Gainsboro;
      padding-top: 20px;
      padding-bottom: 10px;
      border-radius: 25px;
      /* background-color: #2B2C3E; */
      color: black;
    }
  </style>
  <?php
     include("topbar.php");
  ?>
  <div class="col-md-5" id="main">
    <form id="form_file" method="post" enctype="multipart/form-data">
      <div class="form-group col-lg-12" id="post">
        <label for="attachment">Выберите файл...</label>

        <input class="form-control" type="file" id="attachment" name="attachment" accept=".xls, .xlsx"/>

        <br>
        <center>
        <button type="button" name="send_file" id="send_file" class="btn btn-primary" >Отправить</button><br />
        </center>
      </div>
    </form>

    <div id="result">

    </div>
  </div>

 
</form>
<script>
  var files;
  $('input[type=file]').change(function(){
    files = this.files;
    console.log(files)
  });

  $(document).ready(function(){  
    $('#attachment').change(function(){
      // $('#send_file').click(function(){  
        if($('#attachment').get(0).files.length > 0) {
           $('#form_file').submit(); 
        }
        else{
          $('#result').html("<label class='text-danger'>No file selected</label>");
        }
      });  
      $('#form_file').on('submit', function(event){  
           event.preventDefault();  
           $.ajax({  
                url:"parse.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#result').html(data);  
                    //  $('#attachment').val('');  
                }  
           });  
      });  
 });  
  
</script>
  </body>
  </html>