<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
session_start();
if(!isset($_SESSION['username']))
{header('Location:../index.php');}
?>
<html>

<head>
	<title>Online Compiler</title>

<img class="bottom_bar" src="../styles/AU_logo.png" width="395px" height="100px" alt="bar" />								

	<link rel="shortcut icon" href="../styles/Laptop.ico" />
	<link rel="stylesheet" type="text/css" href="../styles/style.css" />
	<link rel="stylesheet" type="text/css" href="../styles/upload.css" />

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/compile.js"></script>
	<script type="text/javascript" src="../js/tab.js"></script>
	<script type="text/javascript" src="../js/jquery.form.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#form2').ajaxForm(function(msg) {
			$('#output2').html(msg);
		});
	});

	document.onkeydown = function (e) {
		e = e || window.event;//Get event
		if (e.ctrlKey) {
			var c = e.which || e.keyCode;//Get key code
			switch (c) {
				case 83://Block Ctrl+S
				e.preventDefault();
				e.stopPropagation();
				break;
			}
		}
	};

	function app(){
		var text=$('#form #code').val();
		var lang = $('#form #language').val();
		//alert(lang);
		document.getElementById("textareacode2").innerHTML = text ;
		//documnet.getElementById("language1").innerHTML = lang;

	}

	function toggle(id){
		var e = document.getElementById(id);
		if(e.style.display == 'block'){
			e.style.display = 'none';
		}else{
			e.style.display = 'block';
		}
	}
	function testing(f){
		alert(f);
	}

	</script>

</head>

<body>
	<div id="whole">
		<div id="header">
			<center>
				<h1>
					Work Space
					<form action="../logout.php">
						<input class="btn btn-danger pull-right" type="submit" value="Logout"></form>
					</h1></center>


				</div>

				<div id="container">
					<table class="code">
						<td class="code">	 <button type="submit" style="float:right;" href="javascript:void(0)" onclick="toggle('popup_box');app();" id="save_but">Save</button> </form>
							<?php if(isset($_GET['savefail']) and ($_GET['savefail']==1)) {?>
								<font style="float:right;" color="red" class="error"> Fail to Save &nbsp;<br/></font>
							<?php }?>
							<?php if(isset($_GET['savesuccess']) and ($_GET['savesuccess']==1)) {?>
								<font style="float:right;" color="green" class="error"> File Save &nbsp; <br/></font>
							<?php }?>
							<form action="compile.php" method="post" id="form">
								Select Language of Interest:
								<select name="language" id="language">
									<option value="c">C</option>
									<option value="cpp">C++</option>
									<option value="java">Java</option>
									<option value="python2.7">Python</option>
									<option value="python3.2">Python3</option>
								</select>
								<br />
								<strong>Enter Your code here:<br/></strong>
								<textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code"></textarea><br/>
								<span id="errorCode" class="error"></span><br/><br/>
								<strong>Sample Input please:<br/></strong>
								<textarea name="input" rows=7 cols=100 id="input"></textarea><br/><br/>
								<input type="submit" value="Submit" id="submit">
								<input type="reset" value="Reset"><br/>

							</form>

						</td>
						<td class="code">

							<form action="upload.php" method="post" enctype="multipart/form-data">
								Select File to upload:
								<div class="row">
									<div class="col-xs-14 col-sm-7">
								<input type="file" name="userfile" id="fileupload" class="upload_tag" />&nbsp;&nbsp;
							</div>
							<div class="col-xs-6 col-sm-3">
								<input type="submit" value="upload file" name="submit" class="btn btn-info" /> </br>
							</div>
							</div>
								<?php if(isset($_GET['fail']) and ($_GET['fail']==1)) {?>
									<font color="red" class="error"> Fail to upload File <br/></font>
								<?php }?>
								<?php if(isset($_GET['success']) and ($_GET['success']==1)) {?>
									<font color="green" class="error"> Successfuly Uploaded <br/></font>
								<?php }?>
							</form>



							<div class="item_list">
								Files in Your Drive :
								<?php

								$dir='./files/'; // Directory where files are stored

								if ($dir_list = opendir($dir))
								{ ?>
									<table class="tab" style="overflow-y: auto;height : 350;display : block;background-color:#D1E2FF;border-bottom: 1px solid white;border-radius: 3px;" width="100%" >
										<?php

										while(($filename = readdir($dir_list)) != false)
										{
											if($filename=='.' || $filename == '..'){}else{
												?>
												<tr><th style="border-bottom: 1px solid white;border-radius: 3px; text-align:left;"><?php  echo $filename;
												?></th>
												<td align="right" style="border-bottom: 1px solid white;border-radius: 3px;padding: 1px;">
													<a href="<?php echo './files/'.$filename; ?>" download>Download</a>
													<a onclick="alert(<?php echo $filename; ?>)">	Edite </a>

													<a onclick="<?php exec('rm files/'.$filename); ?>" >Delete</a>
												</td>
											</tr>
											<?php
										}
									}//while
									?>
								</table>
								<?php
								closedir($dir_list);
							}

							?>
						</div>

						<div id="popup_box" class="popup_position">
							<div id="container3">
								<div class="btext">
									<form method="post" action="save.php" id="form2">
										Code to Save : </br>
										<textarea name="codetosave" rows=25 cols=75 id="textareacode2"></textarea></br></br>
										<input type="text" name="filename" placeholder="Enter the File Name" />
										<select name="language1" id="language1">
											<option value="txt">text</option>
										</select>
										<input type="submit" value="Save" onclick="toggle('popup_box');" />

										<button type="reset" class="close" href="javascript:void(0)" onclick="toggle('popup_box');">Cancle</button>
									</form></br>
								</div>
							</div>

						</div>

					</td>
					
					<tr>
						<td class="code"><strong>Output:</strong>
							<span id="output"></span><br/></td>
							<td class="code"><strong>Output:</strong>
								<span id="output2"></span><br/></td>
							</tr>
						</div>
						<table>
							<div id="bottom">
								@ Powered by: School of Engineering and Applied Science,Ahmedabad University
								<br />
								@ Mentor: Dr. Sanjay Chaudhary
								<br />
								@ Online Compiler - Cloud Computing Project 
								<br />
								@ Devloped By: Charvik Patel,Neel Puniwala,Maharsh Patel,Himanshu budhia
								<br />
<br />
 
<br />
								<p class="descri">
									</div>
								</table>
							</div>
						</body>
						</html>
