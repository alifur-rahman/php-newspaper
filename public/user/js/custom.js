function showTime(){ // Digital watch 
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();


// update user data 
function updateUserData(){
    var name = $('#name').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var bio = $('#bio').val();
    var more_about = $('#more_about').val();

    if(name == ''){
        iziToast.error({
            title: "Name is Required!",
            position: 'topRight'
        });
    }
    else if(username == ""){
        iziToast.error({
            title: "Username is required!",
            position: 'topRight'
        });
    }
    else if(email == ""){
        iziToast.error({
            title: "Email is required!",
            position: 'topRight'
        });
    }
    else{
        var url = "/user/profile/update_user_data";
        var data = {name:name, username:username, email:email, phone:phone, bio:bio, more_about:more_about};
        axios.post(url,data)
        .then(function(response){

            if(response.data != 'duplicate'){
                // document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfully Updated ',
                     position: 'topRight'
                 });
                setTimeout(function(){
                     window.location.href =location.href;
                },1000)
             console.log(response.data);
            }
            else{
                iziToast.error({
                    title: "Can't use this Username",
                    position: 'topRight'
                });
                console.log(response.data);
            }

          
        })
        .catch(function (error){
            console.log(error);
        });
    }
  


}
// update image 
function changeUserImage(){
    // image 
    var fileLength = document.getElementById('image-upload').files.length;


    if(fileLength == 0){
        iziToast.error({
            title: "Insert a Image first",
            position: 'topRight'
        });
    }
    else{
        var file = document.getElementById('image-upload').files[0];
        var fileName = file.name;
        var fileSize = file.size;
        var fileFormate = fileName.split('.').pop();
        let FileData = new FormData();
        FileData.append('FileKey', file);
        let config = {headers:{'content-type':'multipart/form-data'}};



        var url = "/user/profile/update_photo";
        axios.post(url,FileData,config)
        .then(function(response){
           iziToast.success({
                title: 'Change Success',
                position: 'topRight'
            });
            console.log(response);
            setTimeout(function(){
                window.location.href =location.href;
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });
    }
}

function changeUserPassword(){
    var c_pass = $('#c_pass').val();
    var n_pass = $('#n_pass').val();
    if(c_pass == ""){
        iziToast.error({
            title: "Type Current password !",
            position: 'topRight'
        });
    }
    else if(n_pass == ""){
        iziToast.error({
            title: "Type New password !",
            position: 'topRight'
        });
    }
    else{
        var url = "/user/profile/change_user_password";
        var data = {c_pass:c_pass, n_pass:n_pass};
        axios.post(url,data)
        .then(function(response){
            if(response.data != 'duplicate'){
                // document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfull changed',
                     position: 'topRight'
                 });
               
             console.log(response.data);
            }
            else{
                iziToast.error({
                    title: "Current Password not match",
                    position: 'topRight'
                });
                console.log(response.data);
            }
          
        })
        .catch(function (error){
            console.log(error);
        });
    }
}