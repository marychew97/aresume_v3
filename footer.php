<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0d08dde0b3.js" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/aad19734f2.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<!-- <script src="../js/index.js"></script> -->

<script>
    // $('#addDocbutton').click(function(){
    //     $('#addDocuments').append(
    //         '<div class="custom-file"><input type="file" class="custom-file-input" id="customFile"><label class="custom-file-label" for="customFile">Choose file</label></div>'
    //     )
    // })

    $('#signup').on('submit', function (e) {
        e.preventDefault();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm = $('#confirm').val();
        
        var formData = $('#signup').serialize();
        console.log(formData)

        $('#signup-notification').hide();
        $.ajax({
            type: 'post',
            url: 'signup.php',
            data: formData,
            success: function (data) {
                console.log(data);
                $('#signup-notification').append('<p>'+data+'</p>').css("display", "block");
                $('#username').val('');
                $('#email').val('');
                $('#password').val('');
                $('#confirm').val('');
            }
        });
    });

    $('#signin').on('submit', function (e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        
        var formData = $('#signin').serialize();
        console.log(formData)

        $.ajax({
            type: 'post',
            url: 'signin.php',
            data: formData,
            success: function (data) {
                console.log(data);
                $('#signin-notification').append('<p>'+data+'</p>').css("display", "block");
                window.location.href="dashboard.php"
                $('#email').val('');
                $('#password').val('');
            }
        });
    });

    // $('#template-form').on('submit', function(e){
    //     e.preventDefault();
    //     var formData = $('#template-form').serialize();
    //     console.log(formData);
    //     $.ajax({
    //         type: 'post',
    //         url: 'template-submit.php',
    //         data: formData,
    //         success: function (data) {
    //             window.location.href="create.php";
    //         }
    //     })
    // })

    $('#profile-upload').on('change', function(){
        var filename = $(this).val();
        $(this).next('.custom-file-label').html(filename);
    });

    // $('#profile-upload-form').on('submit', function(e){
    //     var formData = new FormData(this);
    //     console.log(formData)
    //     e.preventDefault();
    //     $.ajax({
    //         type: 'post',
    //         url: 'image-upload.php',
    //         data: formData,
    //         dataType: "json",
    //         contentType: false,
    //         processData: false,
    //         success: function (data) {
    //             // console.log(data[0].image);
    //             $('#profile-gallery').append("<img src='uploads/images/"+data.image+"' alt='"+data.id+"' style='width:150px; height:150px;display: block; margin: auto;'/><br/><button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#exampleModal'>Delete</button>");
    //         }
    //     })
    // });

    $('#profile-section-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#create-profile')[0];
        var formData = new FormData(form);
        console.log(formData)
        $.ajax({
            type: 'post',
            url: 'create-profile.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Profile &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#profile-edit-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#edit-profile')[0];
        var formData = new FormData(form);
        console.log(formData)
        $.ajax({
            type: 'post',
            url: 'edit-profile.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Profile &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    })

    $('#check-edu-date').on('change', function(e){
        var checked = this.checked;
        if(checked){
            $('#enddate').prop('type', 'text').val('Present');
        }else{
            $('#enddate').prop('type', 'date');
        }
    })

    $('#education-section-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#create-institution')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'post',
            url: 'create-institution.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Education &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#education-edit-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#edit-institution')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'post',
            url: 'edit-institution.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Education &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#checkworkenddate').on('change', function(e){
        var checked = this.checked;
        if(checked){
            $('#work_enddate').prop('type', 'text').val('Present');
        }else{
            $('#work_enddate').prop('type', 'date');
        }
    })

    $('#work-section-btn').on('click', function(e){
        e.preventDefault();
        var company = $('#company').val();
        var position = $('#position').val();
        var country = $('#work_country').val();
        var city = $('#work_city').val();
        var startdate = $('#work_startdate').val();
        var enddate = $('#work_enddate').val();
        var formData = $('#create-work').serialize();
        $.ajax({
            type: 'post',
            url: 'create-work.php',
            data: formData,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 16.7%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Work Experience &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#work-edit-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#edit-work')[0];
        var formData = $('#edit-work').serialize();
        // var formData = new FormData(form);
        console.log(formData);
        $.ajax({
            type: 'post',
            url: 'edit-work.php',
            data: formData,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 16.7%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Work Experience &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#activity-section-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#create-activities')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'post',
            url: 'create-activities.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Activities &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#activity-edit-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#edit-activities')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'post',
            url: 'edit-activities.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Activities &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#award-section-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#create-award')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'post',
            url: 'create-award.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Awards &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#award-edit-btn').on('click', function(e){
        e.preventDefault();
        var form = $('#edit-award')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'post',
            url: 'edit-award.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Awards &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
            }
        })
    });

    $('#addEducation').on('click', function(e){
        e.preventDefault();
        $('#addEducationSection').append('<div class="container-fluid" style="margin-top: 60px"><div class="row"><div class="col col-sm-4"><div class="form-group"><label for="exampleInputEmail1">Institution</label><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Which institution do/did you study?"></div></div><div class="col col-sm-4"><div class="form-group"><label for="exampleInputPassword1">Area of study</label><input type="text" class="form-control" id="exampleInputPassword1" placeholder="What do you study?"></div></div><div class="col col-sm-4"><div class="form-group"><label for="exampleInputPassword1">Your highest education level</label><select class="custom-select"><option value="Some High School">Some High School</option><option value="High School Diploma">High School Diploma</option><option value="Some College">Some College</option><option value="Associate Degree">Associate Degree</option><option value="Bachelor\'s Degree">Bachelor\'s Degree</option><option value="Master\'s Degree or Higher">Master\'s Degree or Higher</option></select></div></div></div><div class="row"><div class="col col-sm-3"><div class="form-group"><label for="exampleInputEmail1">Country</label><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Which country do you study?"></div></div><div class="col col-sm-3"><div class="form-group"><label for="exampleInputPassword1">City</label><input type="text" class="form-control" id="exampleInputPassword1" placeholder="Which city do you study?"></div></div><div class="col col-sm-3"><div class="form-group"><label for="exampleInputEmail1">Start Date</label><input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="The starting date of your study"></div></div><div class="col col-sm-3"><div class="form-group"><label for="exampleInputPassword1">End Date</label><input type="date" class="form-control" id="exampleInputPassword1" placeholder="The ending date of your study"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck1"><label class="custom-control-label" for="customCheck1">Present</label></div></div></div><div class="col col-sm-3"><div class="form-group"><label for="exampleInputEmail1">GPA</label><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your GPA"></div></div></div></form><button class="btn btn-danger" id="removeEducation">Remove</button></div>');
    })

    $('#addEducationSection').on('click', '#removeEducation', function(e){
        e.preventDefault();
        $(this).parent().remove();
    })
    

    $('#addVideobutton').on('click', function(e){
        e.preventDefault();
        console.log('hey')
        // $('#addVideos').append('<div class="custom-file"><input type="file" class="custom-file-input" id="video-input" aria-describedby="inputGroupFileAddon01"><label class="custom-file-label" for="inputGroupFile01">Choose file</label></div>');
    });

    // $('#addVideobutton').on('click', function(){
    //     alert('hey');
    //     // $('#addVideos').append('<div class="custom-file"><input type="file" class="custom-file-input" id="video-input" aria-describedby="inputGroupFileAddon01"><label class="custom-file-label" for="inputGroupFile01">Choose file</label></div>');
    // });

    $('#photo-input').on('change', function(){
        $('#image-upload-form').submit();
    });
    
    $('#image-upload-form').on('submit', function(e){
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'image-upload.php',
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (data) {
                $('#success-upload-photo').css('display', 'block')
                // console.log(data[0].image);
                $('#addPhotos').append("<img src='uploads/images/"+data.image+"' alt='"+data.id+"' style='width:150px; height:150px;display: block; margin: auto;'/><br/><button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#exampleModal'>Delete</button>");
            }
        })
    });

    $('#image-upload-btn').on('click', function(e){
        $('html, body').animate({scrollTop:0}, 'fast');
        $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Images&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
    });

    $('#doc-upload-btn').on('click', function(e){
        $('html, body').animate({scrollTop:0}, 'fast');
        $('#progress-bar').append('<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Documents&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
    });

    $('#video-upload-btn').on('click', function(e){
        $('html, body').animate({scrollTop:0}, 'fast');
        $('#progress-bar').append('<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Videos&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></div>')
    });

    $('#document-input').on('change', function(){
        $('#document-upload-form').submit();
    });
    
    $('#document-upload-form').on('submit', function(e){
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'document-upload.php',
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (data) {
                console.log('success');
                $('#success-upload-document').css('display', 'block')
                // console.log(data[0].image);
                $('#addDocuments').append("<li>"+data.document+"</li>");
            }
        })
    });

    $('#video-input').on('change', function(){
        $('#video-upload-form').submit();
    });
    
    $('#video-upload-form').on('submit', function(e){
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'video-upload-test.php',
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (data) {
                $('#success-upload-video').css('display', 'block')
                $('#addVideos').append("<video width='300' controls style='display: block; margin: auto;'><source src=uploads/videos/"+data.video+" type='video/mp4'></video>");
                //  $('#addVideos').append("<img src='uploads/videos/"+data.video+"' alt='"+data.id+"' style='width:150px; height:150px;display: block; margin: auto;'/><br/><button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#exampleModal'>Delete</button>");
            }
        })
    });
        
    $('.btn-delete').on('click', function(e){
        var id = $(this).attr('id');
        $('#delete-id').val(id);

        formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'delete-image.php',
            data: formData,
            success: function (data) {
                // console.log(data[0].image);
                console.log(data);
            }
        })
    });

    $('.btn-resume-delete').on('click', function(e){
        var id = $(this).attr('id');
        $('#delete-resume').val(id);

        formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'delete-resume.php',
            data: formData,
            success: function (data) {
                // console.log(data[0].image);
                console.log(data);
            }
        })
    });

    // $('#document-input').on('change', function(){
    //     var filename = $(this).val();
    //     $(this).next('.custom-file-label').html(filename);
    // });
</script>

</body>
</html>