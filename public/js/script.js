$(function(){
	$(".videos .video a").on('click', function(){
		let link = $(this).attr('href');
		$(".model div .model-content .model-body iframe").attr('src', link); 
	});

	$(".quiz.disabled a").click(function(e){
		e.preventDefault();
	});

	$(".video.disabled a").click(function(e){
		e.preventDefault();
	});

	$("#upload_btn").on('click', function(e){
		e.preventDefault();
		if($("#upload_btn").attr('class') != "btn btn-success save_image"){
			$("#image_file").click(); 
		}else{
			$("#form").submit();
		}
	});
	$("image_file").on("change", function(){
		let image_value = $(this).val();
		$("#upload_btn").html("<i class='fas fa-cloud-upload-alt'></i>save");
		$("#upload_btn").attr('class', 'btn btn-success save_image')
		$("#upload_btn").css('width', '100px');
	});

	$("#form").on('submit', function(e){
		e.preventDefault();

		$ajax({
			url: '/profile',
			type: 'POST',
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: function(data){
				$("#message").css('display', 'block');
				$("#message").text(data.message);
				$("#uploaded_image").html(data.uploaded_image);
			},
		});
	});

	$("#send_email_button").click(function(e){
		e.preventDefault();

		$ajax({
			url: '/contact',
			type: 'POST',
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,

			success: function(data){
				$("#name").val('');
				$("#email").val('');
				$("#subject").val('');
				$("#themessage").val('');

				$("#message").css('display', 'block');
				$("#message").text(data.message);

			}
		}); 
	});
});