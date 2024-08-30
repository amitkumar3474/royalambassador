<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    $(document).ready(function(){

        $('.edit-marketing-document-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-edit-marketing-document').addClass('d-none');
        });
        // Get All Marketing Documents
        runBackEndProg(usage_type, lnk_related_rec);
        // Marketing Document Delete
        $(document).on("click", ".att_doc_delete", function() {
            if (confirm("Delete this file?")){
                var id = $(this).attr('doc_id');
                var url = "{{ route('admin.marketing-documents.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        runBackEndProg();
                    }
                });
            }
        });

        // Marketing Document Edit
        $(document).on("click", ".att_doc_edit", function() {
            var id = $(this).attr('doc_id');
            var url = "{{ route('admin.marketing-documents.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    var title = response.attachedDocument.doc_title;
                    $('#doc_edit_title').html("Edit Document:" + title);
                    $('#frm_att_doc_edit input[name="doc_title"]').val(title)
                    $('#frm_att_doc_edit select[name="file_type"]').val(response.attachedDocument.file_type)
                    $('#frm_att_doc_edit select[name="doc_title"]').val(response.attachedDocument.lnk_cat)
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-edit-marketing-document').removeClass('d-none');
                }
            });
        });
    });

     // ***************************************************************************
        // ****************************** Handle New Uploads**************************
        // ***************************************************************************

        // These vars determine to what record it is attached. They can be set either at time of page
        // load via passed params, or dynamically via javascript
        Dropzone.options.docUpload = {
            maxFilesize: 500,
            init: function() {
                this.on("success", function(file) {
                    runBackEndProg();
                    // Get ready for next file upload
                    this.removeAllFiles(true);
                });
            }
        }; // drop-zone

    // Get All Marketing Documents
    function runBackEndProg() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.all-marketing-document') }}",
            data: {usage_type: usage_type, lnk_related_rec:lnk_related_rec},
            success: function(response) {
                console.log(response.attachedDocuments);
                $("#handle_attached_docs .attached_docs_wrap").html("");
                var result = '';
                response.attachedDocuments.forEach(function(doc_info, idx_in_array) {
                    var doc_title = doc_info.doc_title; // Assuming doc_title is doc_info.name
                    result +=
                        '<div idx_in_array="' + idx_in_array + '" class="card file_wrap" upload_type="uploaded"><div>' +
                        '<h3 class="q_tip" title="' + doc_info.doc_title + '">' + doc_title + '</h3>' +
                        '<p>Type: ' + doc_info.file_type;

                    if (doc_info.lnk_user_update)
                        result += ', Updated: ' + doc_info.updated_at.substring(0, 10);
                    else
                        result += ', Updated: Just Now';

                    result += '</p>' +
                        '<p>Category: ' + doc_info.doc_category.cat_name + '</p>';

                    // Allow download only if there was no error in the actual file on disk
                        result += '<br />' +
                           '<a style="color:#0782C1" href="' + "{{ asset('') }}" + doc_info.org_file_name + '" download>' +
                            '<i class="fas fa-download"></i>' +
                            '</a> ';
                        result +=
                        ' <span class="att_doc_delete q_tip" title="Delete this document" doc_id= '+ doc_info.id +'><i class="far fa-trash-alt"></i></span>';    
                        result +=
                        ' <span class="att_doc_edit q_tip" title="Edit this document" doc_id= '+ doc_info.id +'><i class="fas fa-edit"></i></span>';

                    // Close the wrap        
                    result += '</div></div>';
                });
                $("#handle_attached_docs .attached_docs_wrap").append(result);
            }
        });
    }
</script>