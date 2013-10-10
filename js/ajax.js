$(document).ready(function(){
		var function_search_class = function(type,data_send){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					"data_send" : data_send,
					"type_view" : type
				},
				type : "POST",
				success : function(data){
					$(".updates").html(data);
				}
			});
		};
		
		var function_login = function(type,user,password){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					"user" : user,
					"password"  : password,
					"type_view" : type
				},
				type : "POST",
				success : function(data){
					$(".updatelogin").html(data);
				}
			});
		};
		
		var function_logout = function(type){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					
					"type_view" : type
				},
				type : "POST",
				success : function(data){
					$(".updates").html(data);
				}
			});
		};

		var function_status_user = function(type){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					
					"type_view" : type
				},
				type : "POST",
				success : function(data){
					$(".updates").html(data);
				}
			});
		};

		var function_status_ID = function(type,stsid,stnid){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					
					"type_view" : type,
					"userSTSid" : stnid,
					"StatID" : stsid
				},
				type : "POST",
				success : function(data){
					$(".updates").html(data);
				}
			});
		};

		var function_add_user = function(type){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					
					"add_user" : type
				},
				type : "POST",
				success : function(data){
					$(".updates").html(data);
				}
			});
		};

		var function_add_userform = function(type,data_form){
			$.ajax({
				url : "function/AjaxUpdate.php",
				data : {
					
					"add_user" : type,
					"data_user" : data_form
				},
				type : "POST",
				success : function(data){
					$(".updates").html(data);
				}
			});
		};


		
		$(".search_from_day").click(function(event){
			event.preventDefault();
			var dayID = $(this).children(".dayID").val();
			function_search_class("from_day",dayID);
		});
		
		$(".search_from_room").click(function(event){
			event.preventDefault();
			var roomID = $(this).children(".roomID").val();
			function_search_class("from_room",roomID);
		});

		$(".search_from_teacher").click(function(event){
			event.preventDefault();
			var teacherID = $(this).children(".teacherID").val();
			function_search_class("from_teacher",teacherID);
		});

		$(".search_from_group").click(function(event){
			event.preventDefault();
			var groupID = $(this).children(".groupID").val();
			function_search_class("from_group",groupID);
		});
		$(".loginuser").click(function(event){
			event.preventDefault();
			var user = $('#userlogin').val();
		    var password = $('#passwordlogin').val();
			function_login("check_login",user,password);
			
		});
		
		$(".logout").click(function(event){
			event.preventDefault();
			function_logout("check_logout");
			
		});

		$(".status_user").click(function(event){
			event.preventDefault();
			function_status_user("status_users");
			
		});

		$(".activateID").click(function(event){
			event.preventDefault();
			
		    var stsid = $(this).children(".statid").val();
		    var stnid = $(this).children(".statname").val();

			function_status_ID("ActivateID",stsid,stnid);
			
		});

		$(".add_user").click(function(event){
			event.preventDefault();
			function_add_user("add_user");
			
		});

		$(".confirmPWD").change(function(event){
			event.preventDefault();
			var pwd1 = $('.add_userPWD').val();
			var pwd2 = $('.confirmPWD').val();
			if (pwd1=pwd2){

					document.getElementsByClassName('control-group').setAttribute("control-group", "control-group success");
					document.getElementsById('pwd_error').value='';
					alert("Hello 1");

			}
			else {

					document.getElementsByClassName('control-group').setAttribute("control-group", "control-group error");
					document.getElementsById('pwd_error').value='พาสเวิร์ดไม่ตรงกันกรุณาตรวจสอบ';
					alert("Hello 2");


			}
		});

		$(".add_userbtn").click(function(event){
			event.preventDefault();
			var form_data1 = $('.add_userID').val()+","+$('.add_userPWD').val()+","+$('.add_userFSTN').val()+","+$('.add_userLSTN').val()+","+$("input[name='optionsRadios']:checked").val();
			var form_data2 = $('.adduser_email').val()+","+$('.adduser_phone').val()+","+$("input[name='permiss1']:checked").val()+","+$("input[name='active1']:checked").val();

			var form_send = form_data1+","+form_data2;

			//alert(form_send);
			function_add_userform("form_adduser",form_send);
		});

		
	});

