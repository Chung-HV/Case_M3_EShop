
function renderHtmlImage(srcImage) {
    return `<div class="card col-md-3 mr-2">
        <img class="card-img-top image_detail_product" src="${srcImage}" alt="">
        </div>`;
}
function loadPreviewMutipleImage() {
    let files = $(this).get(0).files;
    let fileLength = files.length;
    $('.image_detail_wrapper').html('');
    for (let i = 0; i < fileLength; i++) {
        let fileItem = files[i];
        const reader = new FileReader();
        reader.onload = function(element){
            let data = renderHtmlImage(element.target.result);
            $('.image_detail_wrapper').append(data);
        };

        reader.readAsDataURL(fileItem);
    }

}
$(document).on('change', '.preview_image_detail', loadPreviewMutipleImage);



$ ( ".tags_select_choose" ). select2 ({
    tags : true ,
    tokenSeparators : [ ','] });

// $(".select2_init").select2({
//     placeholder: "Select a state",
//     allowClear: true
// });

var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinyMCE.init(editor_config);
