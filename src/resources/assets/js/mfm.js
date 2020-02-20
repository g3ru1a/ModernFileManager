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
            loadFolderContents(path_as_id);
            return;
        }

        dir_obj.empty();
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
        loadFolderContents(path_as_id);
    });
}



async function loadFolderContents(path_as_id){
    $.get('/mfm/get-files/' + path_as_id, async function(data){
        let files_div = $('#folder_contents');
        let items = JSON.parse(data);
        files_div.empty();
        for(let i = 0; i < items.length; i++){
            let btn = await makeButtonForFiles(path_as_id+'-'+items[i], items[i]);
            files_div.append(btn);
            console.log(path_as_id+'-'+items[i]);
        }
    });
}

async function makeButtonForFiles(path, filename){
    let button = "";
    await $.get('/mfm/get-ext/' + path, function(data){
        button = '<button ondblclick="loadFolderContents(\''+path+'\')" class="btn btn-theme-clear btn-lg"><h1 class="fas fa-'+data+'"></h1><h6>'+filename+'</h6></button>';
    });
    return button;
}

function makeButtonAndCollapsable(path, dir_name){
    let id = path;
    let button = '<button onclick="getDirectories(\''+id+'\', $(this).children(\'small\').eq(0), $(this))" class="mfm-dir btn flat btn-block text-left ml-1 mb-1 py-0" type="button" >' +
        '<small class="fas fa-chevron-right"></small>' +
        ' <i class="fas fa-folder"></i> '+ dir_name +
        '</button>' +
        '<div class="collapse ml-1 pl-2" id="'+id+'"></div>';
    return button;
}
