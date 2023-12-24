/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

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





function sendNewsPostData(){ //send new post data 
    var language = $("input[name='language']:checked").val();
    var headline = 0;
    var featured_news = 0;
    var most_popular = 0;
    var hot_news = 0;
    var new_trends = 0;
    if(document.getElementById('headline').checked){
        headline = 1;
    }
    if(document.getElementById('featured_news').checked){
        featured_news = 1;
    }
    if(document.getElementById('most_popular').checked){
        most_popular = 1;
    }
    if(document.getElementById('hot_news').checked){
        hot_news = 1;
    }
    if(document.getElementById('new_trends').checked){
        new_trends = 1;
    }
    var post_title = document.getElementById('post_title').value;
    var category = document.getElementById('category').value;
    var short_description = document.getElementById('short_description').value;
    var post_content = document.getElementById('post_content').value;
    var publish_at = document.getElementById('publish_at').value;
    // image 
    var fileLength = document.getElementById('image-upload').files.length;
    // end image 
    var tags = document.getElementById('tags').value;
    var status = document.getElementById('status').value;

    if(post_title == ""){
        iziToast.error({
            title: 'Insert Post Title',
            position: 'topRight'
        });
    }
    else if (category == "" ){
        iziToast.error({
            title: 'Select Post Category',
            position: 'topRight'
        });
    }
    else if(publish_at == ""){
        iziToast.error({
            title: 'Insert Publish Date',
            position: 'topRight'
        });
    }
    else if(short_description == ""){
        iziToast.error({
            title: 'Type Short Description',
            position: 'topRight'
        });
    }
    else if( post_content == ""){
        iziToast.error({
            title: 'Type Full Description',
            position: 'topRight'
        });
    }
    else if(fileLength == 0){
        iziToast.error({
            title: 'Insert Post Thumbnail',
            position: 'topRight'
        });
    }
    else if(tags == ""){
        iziToast.error({
            title: 'Tag is required',
            position: 'topRight'
        });
    }
    else if(status == ""){
        iziToast.error({
            title: 'Status is required',
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
        FileData.append('language',language);
        FileData.append('post_title',post_title);
        FileData.append('category',category);
        FileData.append('short_description',short_description);
        FileData.append('post_content',post_content);
        FileData.append('tags',tags);
        FileData.append('status',status);
        FileData.append('publish_at',publish_at);
        FileData.append('headline',headline);

        FileData.append('featured_news',featured_news);
        FileData.append('most_popular',most_popular);
        FileData.append('hot_news',hot_news);
        FileData.append('new_trends',new_trends);

    
        let config = {headers:{'content-type':'multipart/form-data'}};
    

        var url = "/admin/news/insert-post";
        axios.post(url,FileData,config)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
                title: 'Create Success',
                position: 'topRight'
            });
        })
        .catch(function (error){
            console.log(error);
        });
    }
 
};

function sendCatData(){ //send category data 
    var lang = $("input[name='cat_lang']:checked").val();
    var cat_name = document.getElementById('cat_name').value;
    var cat_desc = document.getElementById('cat_desc').value;
    var cat_status = document.getElementById('cat_status').value; 

    if(cat_name == ""){
        iziToast.error({
            title: 'Name is Required!',
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/news/insert-category";
        var data = {lang:lang, cat_name:cat_name, cat_desc:cat_desc, cat_status:cat_status};
        axios.post(url,data)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
                title: 'Successfully Created ',
                position: 'topRight'
            });
           setTimeout(function(){
                window.location.href = "/admin/news/post-categories";
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });
    }




}

function updateCatData(){ // update category data 
    var cat_name = document.getElementById('cat_name').value;
    var cat_id = document.getElementById('cat_id').value;
    var cat_desc = document.getElementById('cat_desc').value; 
    var cat_status = document.getElementById('cat_status').value; 

    if(cat_name == ""){
        iziToast.error({
            title: 'Name is Required!',
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/news/update-category";
        var data = {cat_name:cat_name, cat_id:cat_id, cat_desc:cat_desc, cat_status:cat_status};
        axios.post(url,data)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
                title: 'Successfully Updated',
                position: 'topRight'
            });
           setTimeout(function(){
                window.location.href = "/admin/news/post-categories";
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });
    }
}


function sendTagData(){ //send tag data 
    var tag_name = document.getElementById('tag_name').value;
    var tag_desc = document.getElementById('tag_desc').value;
    var tag_status = document.getElementById('tag_status').value; 

    if(tag_name == ""){
        iziToast.error({
            title: 'Name is Required!',
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/news/insert-tag";
        var data = {tag_name:tag_name, tag_desc:tag_desc, tag_status:tag_status};
        axios.post(url,data)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
            title: 'Successfully Created',
            position: 'topRight'
        });
           setTimeout(function(){
                window.location.href = "/admin/news/post-tags";
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });
    }




}

function submiteNewAds(){ //send category data 
    var Page = document.getElementById('Page').value;
    var Position = document.getElementById('Position').value;
    var adsType = document.getElementById('adsType').value; 
    var expair_at = document.getElementById('expair_at').value;

    if(Page == "null"){
        iziToast.error({
            title: 'Select a page',
            position: 'topRight'
        });
    }
    else if(Position == ""){
        iziToast.error({
            title: 'Please select a position',
            position: 'topRight'
        });
    }
    else if(expair_at == ""){
        iziToast.error({
            title: 'Please insert expair date',
            position: 'topRight'
        });
    }
    else if(adsType == ""){
        iziToast.error({
            title: 'Please Select Ads type',
            position: 'topRight'
        });
    }
    else{
        if(adsType == 'google'){
            var googleClint = document.getElementById('googleClint').value;
            if(googleClint == ""){
                iziToast.error({
                    title: 'Type Google Client ID',
                    position: 'topRight'
                });
            }else{
                var url = "/admin/ads/insertNew";
                var data = {Page:Page, Position:Position, adsType:adsType,expair_at:expair_at,googleClint:googleClint};
                axios.post(url,data)
                .then(function(response){
                    iziToast.success({
                        title: 'Successfully Created',
                        position: 'topRight'
                    });
                    document.getElementById('success-msg').style.display = 'block';
                    console.log(response.data);
                })
                .catch(function (error){
                    console.log(error);
                });
            }
        }
        else if(adsType == "image"){
            var fileLength = document.getElementById('customFile').files.length ;
            var URL = document.getElementById('URL').value;
            console.log(fileLength);
            if(fileLength == 0){
                iziToast.error({
                    title: 'Insert a image',
                    position: 'topRight'
                });
            }
            else if(URL == ""){
                iziToast.error({
                    title: 'URL is Required',
                    position: 'topRight'
                });
            } 
            else{
                var file = document.getElementById('customFile').files[0];
                var fileName = file.name;
                var fileSize = file.size;
                var fileFormate = fileName.split('.').pop();
                let FileData = new FormData();
                FileData.append('FileKey', file);
                FileData.append('Page',Page);
                FileData.append('Position',Position);
                FileData.append('expair_at',expair_at);
                FileData.append('adsType',adsType);
                FileData.append('URL',URL);
            
                let config = {headers:{'content-type':'multipart/form-data'}};
            
                var url = "/admin/ads/insertNew";
                axios.post(url,FileData,config)
                .then(function(response){
                   document.getElementById('success-msg').style.display = 'block';
                   iziToast.success({
                        title: 'Successfully Created',
                        position: 'topRight'
                    });
                    console.log(response.data);
                })
                .catch(function (error){
                    console.log(error);
                });
            }
        }
        else if(adsType == "script"){
            var scriptValue = document.getElementById('scriptValue').value;
            if(scriptValue == ""){
                iziToast.error({
                    title: 'Script Value Can not be empty!',
                    position: 'topRight'
                });
            }else{
                var url = "/admin/ads/insertNew";
                var data = {Page:Page, Position:Position, adsType:adsType,expair_at:expair_at,scriptValue:scriptValue};
                axios.post(url,data)
                .then(function(response){
                    iziToast.success({
                        title: 'Successfully Created',
                        position: 'topRight'
                    });
                    document.getElementById('success-msg').style.display = 'block';
                    console.log(response.data);
                })
                .catch(function (error){
                    console.log(error);
                });
            }
        }
    }
}

function ads_type_input(value){ // hide show input value of ads type 
    if(value == "google"){
        $('#google').show();
        $('#image').hide();
        $('#script').hide();
    }
    else if(value == "image"){
        $('#google').hide();
        $('#image').show();
        $('#script').hide();
        
    }
    else if(value == 'script'){
        $('#script').show();
        $('#google').hide();
        $('#image').hide();
    }
    else{
        $('#google').hide();
        $('#image').hide();
        $('#script').hide();
    }
   
}

function positionByPage(value){ // select page to view positon in create ads page
    $('#Position').html('');

    if(value == "null"){
        $('#Position').html('');
    }
    else{
        var url = "/admin/ads/positionByPage";
        var data = {value:value};
        axios.post(url,data)
        .then(function(response){
            var JSONDATA = response.data;
            var showData = "";
            for(let i=0;i < JSONDATA.length;i++){
                showData += "<option value='"+JSONDATA[i].position_id+"'>"+JSONDATA[i].position_name+" ⇒ max-size : "+JSONDATA[i].ads_size+"</option>";
            }
            $('#Position').append("<option value=''>Select</option>"+showData).selectric();
        })
        .catch(function (error){
            console.log(error);
        });
    }
    
}


function updateMetaSetting(){ // update meta setting data 
    var meta_keyword = document.getElementById('meta_keyword').value;
    var meta_description = document.getElementById('meta_description').value;
    var google_analytics_ID = document.getElementById('google_analytics_ID').value; 

    if(meta_keyword == ""){
        iziToast.error({
            title: "Meta keyword can't be Empty",
            position: 'topRight'
        });
    }
    else if(meta_description == ""){
        iziToast.error({
            title: "Meta description can't be Empty",
            position: 'topRight'
        });
    }
    else if(google_analytics_ID == ""){
        iziToast.error({
            title: "Google analytics ID can't be Empty",
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/seo/update_meta_setting";
        var data = {meta_keyword:meta_keyword, meta_description:meta_description, google_analytics_ID:google_analytics_ID};
        axios.post(url,data)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
            title: 'Successfully Updated',
            position: 'topRight'
        });
           setTimeout(function(){
                window.location.href = "/admin/seo/meta_setting";
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });
    }
}

function updateSocialPageData(){ // update social page data
    var facebook_page_url = document.getElementById('facebook_page_url').value;
    var twitter_page_url = document.getElementById('twitter_page_url').value; 

        var url = "/admin/seo/update_social_page";
        var data = {facebook_page_url:facebook_page_url, twitter_page_url:twitter_page_url};
        axios.post(url,data)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
                title: 'Successfully Updated',
                position: 'topRight'
            });
           setTimeout(function(){
                window.location.href = "/admin/seo/social_page";
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });

}
function updateSocialLinkData(){ // update social links data
    var facebook = document.getElementById('facebook').value;
    var twitter = document.getElementById('twitter').value; 
    var linkedin = document.getElementById('linkedin').value; 
    var printerest = document.getElementById('printerest').value; 
    var vimemo = document.getElementById('vimemo').value; 
    var youtube = document.getElementById('youtube').value; 

        var url = "/admin/seo/update_social_links";
        var data = {
            facebook:facebook,
            twitter:twitter,
            linkedin:linkedin,
            printerest:printerest,
            vimemo:vimemo,
            youtube:youtube
        };
        axios.post(url,data)
        .then(function(response){
           document.getElementById('success-msg').style.display = 'block';
           iziToast.success({
                title: 'Successfully Updated',
                position: 'topRight'
            });
           setTimeout(function(){
                window.location.href = "/admin/seo/social_links";
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });

}


function updateSiteSetting(){ // update site setting data
    var website_title = document.getElementById('website_title').value; 
    var websit_logo_Length = document.getElementById('website_logo').files.length;
    var footer_logo_Length = document.getElementById('footer_logo').files.length;
    var favicon_icon_Length = document.getElementById('favicon_icon').files.length;

    if(website_title == ""){
        iziToast.error({
            title: "Website title can't empty!",
            position: 'topRight'
        });
    }
    // else if(websit_logo_Length == 0){
    //     iziToast.error({
    //         title: 'Please Insert a Logo!',
    //         position: 'topRight'
    //     });
    // }
    // else if(footer_logo_Length == 0){
    //     iziToast.error({
    //         title: 'Please Insert a Footer Logo!',
    //         position: 'topRight'
    //     });
    // }
    // else if(favicon_icon_Length == 0){
    //     iziToast.error({
    //         title: 'Please Insert a Favicon!',
    //         position: 'topRight'
    //     });
    // }
    else{
        var website_logo = document.getElementById('website_logo').files[0];
        var footer_logo = document.getElementById('footer_logo').files[0];
        var favicon_icon = document.getElementById('favicon_icon').files[0];

        let FileData = new FormData();
        FileData.append('website_title', website_title);
        FileData.append('website_logo',website_logo);
        FileData.append('footer_logo',footer_logo);
        FileData.append('favicon_icon',favicon_icon);
    
        var url = "/admin/settings/update_Site_setting";
        let config = {headers:{'content-type':'multipart/form-data'}};
    
        axios.post(url,FileData,config)
        .then(function(response){
            document.getElementById('success-msg').style.display = 'block';
            iziToast.success({
                title: 'Successfully Updated',
                position: 'topRight'
            });
            setTimeout(function(){
                window.location.href = "/admin/settings/site_setting";
            },1000)
            console.log(response);
        })
        .catch(function (error){
            console.log(error);
        });
    }

}


function updatePanelSetting(){ // update panel setting 
    var theme_color = document.getElementById('theme_color').value;

    var url = "/admin/settings/update_panel_face";
    var data = {
        theme_color:theme_color,
    };
    axios.post(url,data)
    .then(function(response){
        document.getElementById('success-msg').style.display = 'block';
        iziToast.success({
            title: 'Successfully Updated',
            position: 'topRight'
        });
        setTimeout(function(){
            window.location.href = "/admin/settings/panel_face";
        },1000)
        console.log(response);
    })
    .catch(function (error){
        console.log(error);
    });
}

function showCategoryName(){
    var radioValue = $("input[name='language']:checked").val();
    $('#category').html('');

    var url = "/admin/news/cat_name_By_Lang";
    var data = {lang:radioValue};
    axios.post(url,data)
    .then(function(response){
        var JSONDATA = response.data;
        var showData = "";
        for(let i=0;i < JSONDATA.length;i++){
            showData += "<option value='"+JSONDATA[i].Name+"'>"+JSONDATA[i].Name+"</option>";
        }
        $('#category').append("<option value=''>Select</option>"+showData).selectric();
    })
    .catch(function (error){
        console.log(error);
    });
}

function showRolesdata(){

    $('#role_data').html('');
    var url = "/admin/user/show_role_data";
    var data = {check:'please'};
    axios.post(url,data)
    .then(function(response){
        var JSONDATA = response.data;
        var showData = "";
        for(let i=1;i < JSONDATA.length;i++){
            showData += "<option value='"+btoa(JSONDATA[i].id)+"'>"+JSONDATA[i].role+"</option>";
        }
        $('#role_data').append("<option value=''>Select</option>"+showData).selectric();
     
    })
    .catch(function (error){
        console.log(error);
    });
}
showRolesdata();
// sent new role data 
function sendNewRoleData(){
    var arr = [];
    var i = 0;
    $('input[name="value"]:checked').each(function () {
        if($(this).val() != 1){
        arr[i++] = $(this).val();
        }
    }); 
    var blkstr = [];
    $.each(arr, function(idx2,val2) {                    
        var str =  val2;
        blkstr.push(str);
    });
    var active_Modules =  blkstr.join(",");
    var role_name = $('#role_name').val();


    if(role_name == ''){
        iziToast.error({
            title: "Role name is Required!",
            position: 'topRight'
        });
    }
    else if(active_Modules == ""){
        iziToast.error({
            title: "Select Modules",
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/user/send_role_data";
        var data = {role_name:role_name, active_Modules:active_Modules};
        axios.post(url,data)
        .then(function(response){

            if(response.data != 'duplicate'){
                document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfully Created ',
                     position: 'topRight'
                 });
                setTimeout(function(){
                     window.location.href = "/admin/user/roles_permission";
                },1000)
             console.log(response.data);
            }
            else{
                iziToast.error({
                    title: "Role Already Exists",
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
function updateRoleData(){
    var arr = [];
    var i = 0;
    $('input[name="value"]:checked').each(function () {
        if($(this).val() != 1){
        arr[i++] = $(this).val();
        }
    }); 
    var blkstr = [];
    $.each(arr, function(idx2,val2) {                    
        var str =  val2;
        blkstr.push(str);
    });
    var active_Modules =  blkstr.join(",");
    var role_name = $('#role_name').val();
    var role_id = $('#role_id').val();


    if(role_name == ''){
        iziToast.error({
            title: "Role name is Required!",
            position: 'topRight'
        });
    }
    else if(active_Modules == ""){
        iziToast.error({
            title: "Select Modules",
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/user/update_role_data";
        var data = {role_name:role_name, active_Modules:active_Modules, role_id:role_id};
        axios.post(url,data)
        .then(function(response){
                document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfully Updated ',
                     position: 'topRight'
                 });
                setTimeout(function(){
                     window.location.href = location.href;
                },1000)
             console.log(response.data);
        })
        .catch(function (error){
            console.log(error);
        });
    }

   

}

function sendUserData(){
    var name = $('#name').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var c_password = $('#c_password').val();
    var role_id = $('#role_data').val();



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
    else if(password == ""){
        iziToast.error({
            title: "Password is required!",
            position: 'topRight'
        });
    }
    else if(c_password == ""){
        iziToast.error({
            title: "Confirm Password is required!",
            position: 'topRight'
        });
    }
    else if(role_id == ""){
        iziToast.error({
            title: "Select Roles",
            position: 'topRight'
        });
    }
    else if(password != c_password){
        iziToast.error({
            title: "Password not match",
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/user/insert_user_data";
        var data = {name:name, username:username, email:email, password:password, role_id:role_id };
        axios.post(url,data)
        .then(function(response){

            if(response.data != 'duplicate'){
                document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfully Created ',
                     position: 'topRight'
                 });
                setTimeout(function(){
                     window.location.href =  location.href;
                },1000)
             console.log(response.data);
            }
            else{
                iziToast.error({
                    title: "Username Already Exists",
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


function updateUserinfo(){
    var name = $('#name').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var role_id = $('#role_data').val();
    var u_id = $('#u_id').val();



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
    else if(role_id == ""){
        iziToast.error({
            title: "Select Roles",
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/user/update_user_data";
        var data = {name:name, username:username, email:email, role_id:role_id,u_id:u_id };
        axios.post(url,data)
        .then(function(response){
                document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfully Updated ',
                     position: 'topRight'
                 });
                setTimeout(function(){
                     window.location.href =  location.href;
                },1000)
             console.log(response.data);
          
        })
        .catch(function (error){
            console.log(error);
        });
    }

   

}

function updateUserPassword(){
    var password = $('#password').val();
    var u_id = $('#u_id').val();
    if(password == ""){
        iziToast.error({
            title: "Type Password !",
            position: 'topRight'
        });
    }
    else{
        var url = "/admin/user/update_user_password";
        var data = {password:password, u_id:u_id };
        axios.post(url,data)
        .then(function(response){
                // document.getElementById('success-msg').style.display = 'block';
                iziToast.success({
                     title: 'Successfully Updated ',
                     position: 'topRight'
                 });
                setTimeout(function(){
                     window.location.href =  location.href;
                },1000)
             console.log(response.data);
          
        })
        .catch(function (error){
            console.log(error);
        });
    }
}



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
        var url = "/admin/profile/update_user_data";
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



        var url = "/admin/profile/update_photo";
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
        var url = "/admin/profile/change_user_password";
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


// admin ePaper 

function sendEpapperData(){
    var e_title = $('#e_title').val();
    var publish_at = $('#publish_at').val();
    // image 
    var fileLength = document.getElementById('image-upload').files.length;

    if(e_title == ""){
        iziToast.error({
            title: "Title Is Required!",
            position: 'topRight'
        });
    }
    else if(fileLength == 0){
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
        FileData.append('title', e_title);
        FileData.append('publish_at', publish_at);
        let config = {headers:{'content-type':'multipart/form-data'}};



        var url = "/admin/ePaper/sendEpaperData";
        axios.post(url,FileData,config)
        .then(function(response){
           iziToast.success({
                title: 'Change Success',
                position: 'topRight'
            });
            setTimeout(function(){
                window.location.href =location.href;
           },1000)
        })
        .catch(function (error){
            console.log(error);
        });
    }
}


$(document).ready(function(){ // post input filed change by language
    $(".lag-selecGroup input[name='language']").click(function(){
        showCategoryName();
    });
    $(".lag-selecGroup input[name='Show_cat_by_lang']").click(function(){
        var radioValue = $("input[name='Show_cat_by_lang']:checked").val();
        console.log(radioValue);
        if(radioValue == 'bn'){
            $('#show-bn').show();
            $('#show-en').hide();
        }
        else if(radioValue == 'en'){
            $('#show-bn').hide();
            $('#show-en').show();
        }
        else{
            $('#show-bn').show();
            $('#show-en').hide();
        }
    });
    showCategoryName();



    // image input change function 

    ImageOnload('website_logo','website_logo_preview');
    ImageOnload('footer_logo','footer_logo_preview');
    ImageOnload('favicon_icon','favicon_icon_preview');
    function ImageOnload(inputId,outputId){
        $('#'+inputId).change(function(){
            var reader=new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function(event){
                var ImgSource = event.target.result;
                $('#'+outputId).attr('src',ImgSource);
            }
        });
    }

   
    var click_count = 0;
    $('.pass-icon').click(function(e){
        $(this).toggleClass('active');
        if(click_count % 2 == 0){
            $(this).parents().children("input").attr('type','text');
        }
        else{
            $(this).parents().children("input").attr('type','password');
        }
        click_count++;
        return false;
    });

   $('.select-layout').click(function(){
        console.log($(this).val());
   });
   $('.select-sidebar').click(function(){
    console.log($(this).val());
   });
   $('.choose-theme li').click(function(){
    console.log($(this).attr('title'));
   });
});





