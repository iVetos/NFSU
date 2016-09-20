$(function(){
    //$("body").css("display", "none").fadeIn(800);
    
    $('.formly').formly({'onBlur':false, 'theme':'Up'});
    
    $(".radio").buttonset();
    $("#cb").buttonset();
    $(".checkboxesli").button();
    
    // tooltop 
    simple_tooltip('.tooltip_link', 'tooltip');
    
    // Alert
    $('#walert').fadeIn(1000).delay(3000).fadeOut(1000);
    
    $('#admin_enter_button').click(function(){
        var error_name = false;
        var error_pass = false;
        if ($('#admin_enter_input_name').val().length > 0){
            $('#admin_enter_input_name').css('border', '1px solid #5bb100').css('background-color', '#d8feaf');
            var error_name = false;
        }
        else {
            $('#admin_enter_input_name').css('border', '1px solid #ff6161').css('background-color', '#ffd5d5');
            var error_name = true;
        }
        if ($('#admin_enter_input_pass').val().length > 0){
            $('#admin_enter_input_pass').css('border', '1px solid #5bb100').css('background-color', '#d8feaf');
            var error_pass = false;
        }
        else {
            $('#admin_enter_input_pass').css('border', '1px solid #ff6161').css('background-color', '#ffd5d5');
            var error_pass = true;
        }
        
        if(!error_name && !error_pass){
            $('#admin_enter').submit();
        }
    });
    
    // Мультизагрузка
    var id_cat_upl = $('#id_cat_upl').val();
    $('#file_upload').uploadify({
        'formData'     : {
    				'id_cat' : id_cat_upl
    			},
       'swf'      : '../admin/swf/uploadify.swf',
       'uploader' : '../admin/ajax_files/uploadify.php'
    });
    
    // Menu sorting
    $('#sortable').sortable({
        revert: true,
        cursor: "move",
        placeholder: "sortable_place",
        'update': function (event, ui) {
            var sortedIDs = $(this).sortable("toArray");
            var pageId = $('#page_id').text();
            $.ajax({
                type: "GET",
                url: "?page=menu&action=sort&id=" + pageId + "&data=" + sortedIDs,
                success:function(msg){
                    $('#walert').remove();
                    $('#wrapper').prepend('<div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" /> Порядок сортировки сохранён</div>');
        			$('#walert').fadeIn(500).delay(3000).fadeOut(500);
    			}
            });
        }
    });
    
    // Categories sorting
    $('#sortable_cat').sortable({
        revert: true,
        cursor: "move",
        placeholder: "sortable_place",
        'update': function (event, ui) {
            var sortedIDs = $(this).sortable("toArray");
            var pageId = $('#page_id').text();
            $.ajax({
                type: "GET",
                url: "?page=catalog&action=sort&id=" + pageId + "&data=" + sortedIDs,
                success:function(msg){
                    $('#walert').remove();
                    $('#wrapper').prepend('<div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" /> Порядок сортировки сохранён</div>');
        			$('#walert').fadeIn(500).delay(3000).fadeOut(500);
    			}
            });
        }
    });
    
    // Gallery
    $('.gallery').sortable({
        revert: true,
        cursor: "move",
        placeholder: "gallery_sortable_place",
        'update': function (event, ui) {
            var sortedIDs = $(this).sortable("toArray");
            var pageId = $('#page_id').text();
            $.ajax({
                type: "GET",
                url: "?page=gallery&action=sort&id=" + pageId + "&data=" + sortedIDs,
                success:function(msg){
                    $('#walert').remove();
                    $('#wrapper').prepend('<div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" /> Порядок сортировки сохранён</div>');
        			$('#walert').fadeIn(500).delay(3000).fadeOut(500);
    			}
            });
        }
    });
    
    $('#name').keyup(function(){
        var name = $(this).val();
        var table = $('#addr_table').val();
        var addr2 = $('#addr2').val();
        $.ajax({
            type: "POST",
            url: "/admin/ajax_files/do_addr.php",
            data: {
                name : name
            },
            success:function(addr){
                $('#addr').val(addr);
                if(addr != addr2){
                    $.ajax({
                        type: "POST",
                        url: "/admin/ajax_files/check_addr.php",
                        data: {
                            addr : addr,
                            table : table
                        },
                        success:function(msg){
            				$('#addr_text').html(msg).show(500);
            			}
                    });
                }
                else {
                    $('#addr_text').html('');
                }
			}
        });
    });
    
    $('#addr').keyup(function(){
        var addr = $(this).val();
        var addr2 = $('#addr2').val();
        var table = $('#addr_table').val();
        $.ajax({
            type: "POST",
            url: "/admin/ajax_files/do_addr.php",
            data: {
                name : addr
            },
            success:function(newAddr){
                $('#addr').val(newAddr);
                if(newAddr != addr2){
                    $.ajax({
                        type: "POST",
                        url: "/admin/ajax_files/check_addr.php",
                        data: {
                            addr : newAddr,
                            table : table
                        },
                        success:function(msg){
            				$('#addr_text').html(msg).show(500);
            			}
                    });
                }
                else {
                    $('#addr_text').html('');
                }
            }
        });
    });
    
    // Delete product`s img
    $('.cat_del_img_but').click(function(){
        var img = $(this);
        var productId = $('#product_id').val();
        var imgName = $(this).parent('.cat_del_img').children('.cat_del_img_name').text();
        var imgNum = $(this).parent('.cat_del_img').children('.cat_del_img_num').text();
        $.ajax({
            type: "POST",
            url: "/admin/ajax_files/del_img.php",
            data: {
                id : productId,
                img : imgName,
                num : imgNum
            },
            success:function(msg){
                img.parent('.cat_del_img').slideUp(300);
				$('#walert').remove();
                $('#wrapper').prepend('<div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" /> ' + msg + '</div>');
    			$('#walert').fadeIn(500).delay(3000).fadeOut(500);
			}
        });
    });
    
    // Help
    $('.help_ul li').click(function(){
        $(this).children('p').slideToggle(500);
    });
    
    $('a[href^="#"]').click(function(){
        var target = $(this).attr('href');
        $('html, body').animate({scrollTop: $(target).offset().top}, 300);
        return false; 
    });
    
    // Datepicker
	$('.datepicker_birth').datepicker({
		inline: true,
		dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-70:-15"
	});
    
    $('.datepicker').datepicker({
		inline: true,
		dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-5:c+5"
	});
    
    $('input:file').upInputFile();
    
    // fancybox
    $('.fancybox').fancybox();
    
    // Tags
    var tagCheck = $('#tags').val();
    if(tagCheck != undefined){
        tagCheck.trim();
    }
    if(tagCheck < 1){
        $('#tags_cur').hide();
    }
    else {
        tagDel();
    }
    
    // Ввод тегов
    $('#tags_add').click(function(){
        var tags = $('#tags_field').val().trim(); // новые теги
        var curTags = $('#tags').val().trim();    // текущие теги из скрытого поля
        var arr = tags.split(' ');                // массив с новыми тегами
        var str = '';                             // строка с тегами
        // массив с текущими тегами
        if(curTags.length > 0){
            var artags = curTags.split(',');
        } else {
            var artags = [];
        }
        
        // Если теги уже вводились
        if(artags.length > 0){
            // alert(artags.length);
            for(var i=0; i<artags.length; i++) {
                artags[i] = artags[i].trim();
                if(artags[i].length > 0){
                    str = str + '<span><img src="/admin/img/icons/dels.png" alt="" />' + artags[i] + '</span>';
                }
            }
        } else {
            artags = [];
        }
        
        // Добавляем в массив с тегами введённые теги
        for(var i=0; i<arr.length; i++) {
            arr[i] = arr[i].trim();
            if(arr[i].length > 0){
                // проверяем есть нет ли такого тега в массиве
                if(jQuery.inArray(arr[i], artags) == -1){
                    artags.push(arr[i]);                  
                    str = str + '<span><img src="/admin/img/icons/dels.png" alt="" />' + arr[i] + '</span>';
                }
            }
        }
        // Если есть хотябы один элемент массива
        if(artags.length > 0)
        {
            $('#tags_field').val('');           // очищаем поле ввода тегов
            $('#tags').val(artags);             // скрытое поле
            $('#tags_cur').html(str).show(500); // показываем строку с текущими тегами
            tagDel();
        }
    });
    
    // Показать\скрыть доступные теги
    $('#tags_but').click(function(){
        $('#tags_all').toggle(500);
    });
    
    // Доступные теги
    $('#tags_all span').click(function(){
        var tag = $(this).text();           // выбраный тег
        var tags = $('#tags').val().trim(); // текущие теги из скрытого поля
        var str = $('#tags_cur').html();    // строка с текущимим тегами
        // массив с текущими тегами
        if(tags.length > 0){
            var tags = tags.split(',');
        } else {
            tags = [];
        }

        if(jQuery.inArray(tag, tags) == -1){
            str = str + '<span><img src="/admin/img/icons/dels.png" alt="" />' + tag + '</span>';
            tags.push(tag);
        }
        if(tags.length > 0)
        {
            $('#tags').val(tags);
            $('#tags_cur').html(str).show(500);
            tagDel();
        }
    });
    
    // Скрыть\показать раздел
    $('.visible').click(function(){
        var id = $(this).children('.vid').text();
        var value = $(this).children('.vvalue').text();
        var table = $(this).children('.vtable').text();
        var visible = $(this);
        $.ajax({
            type: "POST",
            url: "/admin/ajax_files/visible.php",
            data: {
                id: id,
                value: value,
                table: table
            },
            success:function(msg){
                $('#walert').remove();
                $('#wrapper').prepend('<div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" /> ' + msg + '</div>');
    			$('#walert').fadeIn(500).delay(3000).fadeOut(500);
    		}
        });
        if(value == 1) {
            visible.html('<span class="none vid">' + id + '</span><span class="none vvalue">0</span><span class="none vtable">categories</span><a href="javascript:void(0);"><span class="icon_cont icon_cont_visible" title="Скрыть"></span></a>');
        }
        else {
            visible.html('<span class="none vid">' + id + '</span><span class="none vvalue">1</span><span class="none vtable">categories</span><a href="javascript:void(0);"><span class="icon_cont icon_cont_invisible" title="Скрыть"></span></a>');
        }
    });

});




// Удаление тегов
function tagDel(){
    $('#tags_cur span').click(function(){
        var tag = $(this).text();           // выбраный тег
        var newTags = [];                   // результативный массив
        var str = '';                       // строка с тегами
        var tags = $('#tags').val().trim(); // текущие теги из скрытого поля
        tags = tags.split(',');             // массив с текущими тегами
        
        for(var i=0; i<tags.length; i++) {
            if(tags[i] != tag){
                newTags.push(tags[i]);
                str = str + '<span><img src="/admin/img/icons/dels.png" alt="" />' + tags[i] + '</span>';
            }
        }
        if(newTags.length > 0)
        {
            $('#tags').val(newTags);
            $('#tags_cur').html(str).show(500);
            tagDel();
        }
        else {
            $('#tags').val('');
            $('#tags_cur').html('').hide(500);
        }
    });
}

function confirmDelete(title, message, link) {
	$('.window').html('<h3>' + title + '</h3><div class="window_content">' + message + '</div><div class="window_footer"><span class="btn">Ок</span> <span class="btnc">Отмена</span></div>');
    $('.overlay').fadeIn(500);
    $('.window').fadeIn(500);
    $('.overlay, .btnc').click(function(){
        $('.overlay').fadeOut(500);
        $('.window').fadeOut(500);
    });
    $('.btn').click(function(){
        $('.overlay').fadeOut(500);
        $('.window').fadeOut(500);
        location.href = link;
    });
    $('.window').draggable();
}

function alertObj(obj) { 
    var str = ""; 
    for(k in obj) { 
        str += k+": "+ obj[k]+"\r\n"; 
    } 
    alert(str); 
}

function simple_tooltip(target_items, name) {
    $(target_items).each(function(i){
        $('body').append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
        var my_tooltip = $("#"+name+i);
        
        $(this).removeAttr("title").mouseover(function(){
            my_tooltip.css({opacity:0.9, display:"none"}).fadeIn(400);
        }).mousemove(function(kmouse){
            my_tooltip.css({left:kmouse.pageX+15, top:kmouse.pageY+15});
        }).mouseout(function(){
            my_tooltip.fadeOut(400);
        });
    });
}