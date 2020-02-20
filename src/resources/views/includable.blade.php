<?php
    if(!isset($mfm)){ abort(422, 'No MFM Instance has been passed to the view.');}

//    dd($mfm->getContents());

    $cont = $mfm->getContents();
    $path = $mfm->getPath();
?>

<link rel="stylesheet" href="{{ asset('/vendor/mfm/css/font-awesome/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/mfm/css/theme.css') }}">
<script src="{{ asset('/vendor/mfm/js/mfm.js') }}?v2"></script>

<div class="row">
    <div class="alert alert-primary col-12" role="alert">
        <?php echo highlight_string("<?php\n\$data =\n" . var_export($cont, true) . ";\n?>") ?>
    </div>
    <div class="card col-11 px-0" id="mfm-container">
        <div class="card-body p-0 h-100">
            <div class="row p-2 border-bottom bg-theme-ui border-theme">
                <div class="col-12 mfm-menu ">
                    <div class="btn-group mb-2 mb-md-0 mr-1">
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-chevron-left"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-chevron-right"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-chevron-up"></i> </button>
                    </div>
                    <button class="btn btn-theme-clear text-white flat mb-2 mb-md-0 mr-1"> <i class="fa fa-sync-alt"></i> </button>
                    <div class="btn-group mb-2 mb-md-0 mr-1">
                        <button class="btn btn-theme-clear text-white flat"> <i class="fas fa-file-medical"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-folder-plus"></i> </button>
                    </div>
                    <div class="btn-group mb-2 mb-md-0 mr-1">
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-upload"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-download"></i> </button>
                    </div>
                    <div class="btn-group mb-2 mb-md-0 mr-1">
                        <button class="btn btn-theme-clear text-white flat"> <i class="fas fa-copy"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fas fa-cut"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fas fa-paste"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fas fa-times-circle"></i> </button>
                    </div>
                    <div class="btn-group mb-2 mb-md-0 mr-1">
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-list"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-th-large"></i> </button>
                        <button class="btn btn-theme-clear text-white flat"> <i class="fa fa-th"></i> </button>
                    </div>
                </div>
            </div>
            <div class="row h-100">
                <!--  Directory Tree  -->
                <div class="col-12 col-md-3 border-right border-theme bg-theme-ui" id="mfm_dir_tree">
                    <div class="pt-2 mfm-dir-tree">
                        @php($id_b = str_replace('/', '-', $mfm->getPath()))
                        <button onclick="getDirectories('{{ $id_b }}', $(this).children('small').eq(0), $(this))" class="mfm-dir flat btn btn-block text-left ml-1 mb-1 py-0" type="button" >
                            @php($subdirs = json_decode(\MAZE\MFM\Controllers\MFMController::get($mfm->getPath())))
                            @if(count($subdirs) != 0)
                                <small class="fas fa-chevron-down"></small>
                            @endif
                            <i class="fas fa-inbox"></i> {{ $mfm->getPath() }}
                        </button>
                        <div class="collapse ml-1 pl-2 show" id="{{ $id_b }}">
                            @foreach($cont as $d)
                                @if(is_dir($path.'/'.$d) && $d != '.' && $d != '..')
                                    @php($id = str_replace('/', '-', $path.'/'.$d))
                                    <button onclick="getDirectories('{{ $id }}', $(this).children('small').eq(0), $(this))" class="mfm-dir flat btn btn-block text-left ml-1 mb-1 py-0" type="button" >
                                        @php($subdirs = json_decode(\MAZE\MFM\Controllers\MFMController::get($path.'-'.$d)))
                                        @if(count($subdirs) != 0)
                                            <small class="fas fa-chevron-right"></small>
                                        @endif
                                        <i class="fas fa-folder"></i> {{ $d }}
                                    </button>
                                    <div class="collapse ml-1 pl-2" id="{{ $id }}">

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9 p-2" id="folder_contents">
{{--                    <button class="btn btn-theme-clear btn-lg"><h1 class="fas fa-folder"></h1><h6>Blah</h6></button>--}}
                    @foreach($cont as $d)
                        @if($d != '.' && $d != '..')
                            @php($tpath = str_replace('/', '-', $path.'/'.$d))
                            <button ondblclick="loadFolderContents('{{ $tpath }}')" class="btn btn-theme-clear btn-lg"><h1 class="fas fa-{{ \MAZE\MFM\Controllers\MFMController::getFileType($path.'-'.$d) }}"></h1><h6>{{$d}}</h6></button>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
