$(document).ready(function(){
    $('#normalselect').attr("disabled", true);
    $('.alert-block').fadeIn(1000);
    setTimeout(function(){$('.alert-block').fadeOut(1000);},4000);

    // Admin Edit Karaoke --------------------------
    $('#superselect').change(function(){
        var data = $(this).val();
        $.ajax({
            url:'/admin/edit/findnormal',
            data:{data:data},
            type:'get',
            dataType: 'json',
            success:function(data){
                console.log(data);
                if(data != 'no'){
                    $('#normalselect').attr("disabled", false);
                    $('#normalselect').empty();
                    $('#normalselect').append(`
                        <option value="">Please select</option>
                    `);
                    $('#normalselect option').text('Please select');
                    for(var i=0;i<data.length;i++){
                        $('#normalselect').append(`
                            <option value="${data[i].id}">${data[i].normal_category_name}</option>
                        `);
                    }                    
                }else{
                    $('#normalselect').empty();
                    $('#normalselect').append(`
                        <option value="">Please select</option>
                    `);
                    // $('#normalselect').attr("disabled", true);
                }
            }
        })
    })
// Admin Play Search ------------------------------------------------
    $('#supersearch').change(function(){
        var data = $(this).val();
        $.ajax({
            url:'/admin/play/find',
            data:{data:data},
            type:'get',
            dataType:'json',
            success:function(data){
                // console.log(data);
                if(data[0] == 'normal'){
                    $('#normalsearch').attr('disabled',false);
                    $('#normalsearch').empty();
                    $('#multiselect').empty();
                    $('#multiselect').append(`
                        <option value="">No item</option>
                    `);
                    $('#normalsearch').append(`
                        <option value="">Please select</option>
                    `);
                    for(var i=0;i<data[1].length;i++){
                        $('#normalsearch').append(`
                            <option value="${data[1][i].id}">${data[1][i].normal_category_name}</option>
                        `);
                    }     
                }else if(data[0] == 'yes'){
                    $('#normalsearch').empty();
                    $('#normalsearch').append(`
                        <option value="">Please select</option>
                    `);
                    $('#multiselect').empty();
                    $('#multiselect').attr('disabled',false);
                    for(var i=0;i<data[1].length;i++){
                        $('#multiselect').append(`
                        <option value="${data[1][i].id}">${data[1][i].title}</option>
                        `)
                    }
                }else{
                    $('#normalsearch').empty();
                    $('#multiselect').empty();
                    $('#normalsearch').append(`
                        <option value="">Please select</option>
                    `);
                    $('#multiselect').append(`
                        <option value="">No item</option>
                    `);
                }
            }
        })
    })

    $('#normalsearch').change(function(){
        var data = $(this).val();
        $.ajax({
            url:'/admin/play/findonly',
            data:{data:data},
            type:'get',
            dataType:'json',
            success:function(data){
                console.log(data);
                if(data[0] == 'yes'){
                    $('#multiselect').attr('disabled',false);
                    $('#multiselect').empty();
                    for(var i=0;i<data[1].length;i++){
                        $('#multiselect').append(`
                        <option value="${data[1][i].id}">${data[1][i].title}</option>
                        `)
                    }
                }else{
                    $('#multiselect').empty();
                    $('#multiselect').append(`
                        <option value="">No item</option>
                    `);
                }
            }
        })
    })

    $('#search').on('keydown',function(){
        if($('#search').val().length < 3){
            $('#multititle').empty();
            $('#multititle').append(`
                    <option value=''>No item</option>
                `);
        }
        var target = $('#search').val();
        if(target.length >= 3){
            $.ajax({
                url: '/admin/play/findkaraoke',
                data: {target:target},
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var result = '';                    
                    if(data.length != 0){
                        $('#multititle').empty();
                        $('#multititle').attr("disabled", false);
                        data.forEach(target => {
                            result += `<option value='${target.id}'>${target.title}</option>`;                            
                        });
                        $('#multititle').append(result);
                    }else{
                            $('#multititle').empty();
                            $('#multititle').append(`
                                <option value=''>No item</option>
                            `);
                    }                  
                    
                }
            });
        }        
    });

    $('#addqueue').click(function(event){
        event.preventDefault();
        $('#search').val('');
        $('#karaokeform').submit();
    })
})