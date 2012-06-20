$(".newapplication-modal").ready(function(){
	$(".click_on_load").click();
});


$("#myCarousel").carousel({
  interval: 2000
});


$(document).ready(function(){

	

	
	function login(){
		var value =$("#loginUid").val();
		if(value!="verifier" && value!="kioskuser" && value!="approver" && value!="admin" && value!="executive" )
		{

		//$(".alertbox").css("display","block");
		}
		else{

			window.localStorage.uid=value;
			window.location.href="home.html";
		}
	}
	$(".login-text").keypress(function(e){
		if(e.which==13){
		login();
		}
	});
	$("#loginBtn").click(function(){
		login();
	});

$("#myModalEdit input[type=text],#myModalEdit textarea,#myModal input[type=text],#myModal textarea").keypress(function(e){
	convertThis(e);
	$("#HelpDiv").hide();
});
	$(".signoutLink").click(function(e){
		e.preventDefault();
		delete window.localStorage.uid;
		window.location.href="index.html";
	});

	if(window.localStorage.uid){
		$(".btn-verify").html("Verify");
		$(".img-new-appli").css({'display':'inline'});
		$(".btn-verify,.btn-reject,.btn-save,.btn-new-user,.btn-save-user,.btn-view-files,.btn-upload-files,.scan-doc-approver").css({'display':'inline'});
	$("#myModalEdit input[type=text],#myModalEdit select,#myModalEdit textarea,.edit-user-form input,.edit-user-form select,.edit-user-form textarea,.btn-del-user").removeAttr("disabled");	
	$(".custom-disable").css({'display':'none'});
	$(".btn-del-user").removeAttr("disabled");
	$(".vis-ku").css({'display':'none'});
	var value = window.localStorage.uid ;
	$(".logged-user-role span").html(value);
	if(value=="kioskuser"){
		$(".vis-ku").css({'display':'block'});
		$(".btn-verify,.btn-reject,.btn-view-files").css({'display':'none'});

	}
	else if(value=="verifier"){
		$(".btn-view-files,.btn-save").css({'display':'none'});
		$("#myModalEdit input[type=text],#myModalEdit select,#myModalEdit textarea").attr("disabled","disabled");
	}
	else if(value=="approver"){
		$(".scan-doc-approver,.btn-upload-files,.btn-save").css({'display':'none'});
		$(".btn-verify").html("Approve");
		$("#myModalEdit input[type=text],#myModalEdit select,#myModalEdit textarea").attr("disabled","disabled");
	}
	
	else if(value=="admin"){
	$(".custom-disable").css({'display':'block'});	
	$(".vis-ku").css({'display':'block'});
	$(".btn-view-files,.btn-verify,.btn-reject").css({'display':'none'});


	}
	else if(value=="executive"){
	
	$(".btn-verify,.btn-reject,.btn-save,.btn-new-user,.btn-save-user,.btn-view-files,.btn-upload-files").css({'display':'none'});	
	$(".custom-disable").css({'display':'block'});	
	$("#myModalEdit input[type=text],#myModalEdit select,#myModalEdit textarea,.edit-user-form input,.edit-user-form select,.edit-user-form textarea,.btn-del-user").attr("disabled","disabled");

		
	}
	$(".vis-ku").click(function(){
	$(".img-new-appli").css({'display':'none'});
});	
}

	
	});