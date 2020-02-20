$('.collapse').collapse();

function getDirectories(path_as_id, icon, button_self){
    $('.mfm-dir').each(function(){
        $(this).removeClass('bg-theme').removeClass('text-white');
    });
    button_self.addClass('bg-theme').addClass('text-white');
    $.get('/mfm/get/' + path_as_id, function(data){
        let dir_obj = $('#'+path_as_id);

        let dirs = (JSON).parse(data);

        if(dir_obj.hasClass('show')) {
            dir_obj.collapse('toggle');
            if(dirs.length != 0){
                icon.toggleClass('fa-chevron-right').toggleClass('fa-chevron-down');
            }
            return;
        }

        dir_obj.empty();
        console.log(dirs);
        for (let i = 0; i < dirs.length; i++){
            let button = makeButtonAndCollapsable(path_as_id+'-'+dirs[i], dirs[i]);
            dir_obj.append(button);
        }
        if(dirs.length == 0){
            icon.removeClass('fa-chevron-right');
        }else{
            if(!icon.hasClass('fa-chevron-right')) icon.toggleClass('fa-chevron-right');
            icon.toggleClass('fa-chevron-right').toggleClass('fa-chevron-down');
            dir_obj.collapse('toggle');
        }
    });
}


function makeButtonAndCollapsable(path, dir_name){
    let id = path;
    let button = '<button onclick="getDirectories(\''+id+'\', $(this).children(\'small\').eq(0), $(this))" class="mfm-dir btn ml-1 py-0" type="button" >' +
        '<small class="fas fa-chevron-right"></small>' +
        ' <i class="fas fa-folder"></i> '+ dir_name +
        '</button>' +
        '<div class="collapse ml-1 pl-2" id="'+id+'"></div>';
    return button;
}
