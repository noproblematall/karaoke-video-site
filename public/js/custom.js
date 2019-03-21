$(document).ready(function(){
    // Karaoke store function ------------------------
    $('#song-import').click(function(){
        $('#title').css('border','none');
        $('.custom-file label').css('outline','none');
        if(!$('#title').val().trim()){
            $('#title').focus();
            $('#title').css('border','3px solid red');
            return false;
        }
        else if(!$('#customFile1').val()){
            $('.file1 label').css('outline','2px solid red');
            $('#customFile1').focus();
            return false;
        }
        else if(!$('#customFile2').val()){
            $('.file2 label').css('outline','2px solid red');
            $('#customFile2').focus();
            return false;
        }
        var formData = new FormData();
        formData.append('_token', $('#token').val());
        formData.append('title', $('#title').val().trim());
        // if($('#artist').val().trim()){
            formData.append('artist',$('#artist').val().trim());
        // }
        // if($('#code').val().trim()){
            formData.append('code',$('#code').val().trim());
        // }
        formData.append('insert',$("input[name='insert']:checked").val());
        formData.append('customfile1', $('#customFile1')[0].files[0]);
        formData.append('customfile2', $('#customFile2')[0].files[0]);
        console.log($('#customFile1').val());
        var cdgfile = $('#customFile1').val();
        var mp3file = $('#customFile2').val();
        var pattern1 = /([a-zA-Z0-9\s_\\.\[\]\-\(\):])+(.cdg)$/;
        var pattern2 = /([a-zA-Z0-9\s_\\.\[\]\-\(\):])+(.mp3|.ogg)$/;
        if(!pattern1.test(cdgfile)){
            $('#error').text('Please input CDG file');
            $('#error').fadeIn(1500).fadeOut(1500);
            $('.file1 label').css('outline','2px solid red');
            $('#customFile1').focus();
            return false;
        }
        else if(!pattern2.test(mp3file)){
            $('#error').text('Please input MP3 file');
            $('#error').fadeIn(1500).fadeOut(1500);
            $('.file2 label').css('outline','2px solid red');
            $('#customFile2').focus();
            return false;
        }
        $.ajax({
            url: '/store',
            data: formData,
            type: "POST", //ADDED THIS LINE
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            // ... Other options like success and etc
            success:function(data){
                if(data=='ok'){
                    $('#success').fadeIn(1000).fadeOut(1000);
                }else if(data=='no'){
                    // alert(data);
                    $('#error').text('The song already is added');
                    $('#error').fadeIn(1500).fadeOut(1500);
                    $('#title').css('outline','2px solid red');
                    $('#title').focus();
                    // return false;
                }
                console.log(data);
            }
        })
    });

    // Search Songs function ----------------------------

    $('#search').on('keydown',function(){
        var target = $('#search').val();
        if(target.length >= 3){
            
            $.ajax({
                url: '/find',
                data: {target:target},
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var result = '';
                    $('#search-result ul').empty();
                    if($('#search').val().length < 3){
                        $('#search-result ul').empty();
                    }else{
                        data.forEach(target => {
                            result += `<li id='${target.id}'>${target.title}</li>`;                            
                        });
                        $('#search-result ul').append(result);
                        if(data.length == 1){
                            $('#search-result ul li').css({'padding':'10px 20px','border':'none'});
                        }
                    }
                    $('#search-result ul li').click(function(){
                        // console.log($(this).text());
                        $('#search').val($(this).text());
                        $('#search-result ul').empty();
                    })
                    
                }
            });
        }        
    });
    // Add to Queue Songs ----------------------------------------
    $('#addqueue').click(function(){
        $('#search-result ul').empty();
        if($('#search').val().trim() == ''){
            $('#error').text('Please input song title');
            $('#error').fadeIn(1500).fadeOut(1500);
            $('#search').css('outline','2px solid red');
            $('#search').focus();
            return false;
        }
        else {
            var title = $('#search').val().trim();
            $.ajax({
                url: '/addqueue',
                data: {title:title},
                type: 'GET',
                success: function(data){
                    console.log(data);
                    if(data == 'ok'){
                        $('#success').fadeIn(1000).fadeOut(1000);
                    }
                    else if(data == 'no'){
                        $('#error').text('Sorry! There is not the song.');
                        $('#error').fadeIn(1500).fadeOut(1500);
                        $('#search').css('outline','2px solid red');
                        $('#search').val('');
                        $('#search').focus();
                    }
                    else if(data == 'same'){
                        // alert(data);
                        $('#error').text('Sorry! The song already is added.');
                        $('#error').fadeIn(1500).fadeOut(1500);
                        $('#search').css('outline','2px solid red');
                        $('#search').val('');
                        $('#search').focus();
                    }
                }
            })
        }
    })
    
});